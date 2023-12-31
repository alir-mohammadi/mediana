<template>
  <DefaultField
    :field="currentField"
    :errors="errors"
    :show-help-text="showHelpText"
    :full-width-content="fullWidthContent"
  >
    <template #field>
      <div v-if="value.length > 0" class="space-y-4">
        <RepeaterRow
          v-for="(item, index) in value"
          :item="item"
          :index="index"
          :key="JSON.stringify(item)"
          @click="removeItem(index)"
          :errors="errors"
          :sortable="currentField.sortable && value.length > 1"
          @move-up="moveUp"
          @move-down="moveDown"
          :field="currentField"
          :via-parent="fieldAttribute"
        />
      </div>
      <div>
        <div class="text-center">
          <Dropdown v-if="currentField.repeatables.length > 1">
            <DropdownTrigger
              class="link-default inline-flex items-center cursor-pointer px-3 space-x-1"
            >
              <span><Icon type="plus-circle" /></span>
              <span class="font-bold">{{ __('Add item') }}</span>
            </DropdownTrigger>

            <template #menu>
              <DropdownMenu class="py-1">
                <DropdownMenuItem
                  @click="() => addItem(repeatable.type)"
                  as="button"
                  v-for="repeatable in currentField.repeatables"
                  class="space-x-2"
                >
                  <span><Icon :type="repeatable.icon" /></span>
                  <span>{{ repeatable.singularLabel }}</span>
                </DropdownMenuItem>
              </DropdownMenu>
            </template>
          </Dropdown>

          <InvertedButton
            v-else
            @click="addItem(currentField.repeatables[0].type)"
            type="button"
          >
            <span>{{
              __('Add :resource', {
                resource: currentField.repeatables[0].singularLabel,
              })
            }}</span>
          </InvertedButton>
        </div>
      </div>
    </template>
  </DefaultField>
</template>

<script>
import { FormField, HandlesValidationErrors } from '@/mixins'
import cloneDeep from 'lodash/cloneDeep'
import { computed } from 'vue'

export default {
  mixins: [FormField, HandlesValidationErrors],

  provide() {
    return {
      removeFile: this.removeFile,
      shownViaNewRelationModal: computed(() => this.shownViaNewRelationModal),
      viaResource: computed(() => this.viaResource),
      viaResourceId: computed(() => this.viaResourceId),
      viaRelationship: computed(() => this.viaRelationship),
      resourceName: computed(() => this.resourceName),
      resourceId: computed(() => this.resourceId),
    }
  },

  methods: {
    removeFile(attribute) {
      const {
        resourceName,
        resourceId,
        relatedResourceName,
        relatedResourceId,
        viaRelationship,
      } = this

      const uri =
        viaRelationship && relatedResourceName && relatedResourceId
          ? `/nova-api/${resourceName}/${resourceId}/${relatedResourceName}/${relatedResourceId}/field/${attribute}?viaRelationship=${viaRelationship}`
          : `/nova-api/${resourceName}/${resourceId}/field/${attribute}`

      Nova.request().delete(uri)
    },

    fill(formData) {
      this.finalPayload.forEach((repeatable, i) => {
        const attribute = `${this.fieldAttribute}[${i}]`
        formData.append(`${attribute}[type]`, repeatable.type)
        Object.keys(repeatable.fields).forEach(key => {
          formData.append(
            `${attribute}[fields][${key}]`,
            repeatable.fields[key]
          )
        })
      })
    },

    addItem(repeatableType) {
      const repeatable = this.currentField.repeatables.find(
        t => t.type === repeatableType
      )
      const copy = cloneDeep(repeatable)

      this.value.push(copy)
    },

    removeItem(index) {
      this.value.splice(index, 1)
    },

    moveUp(index) {
      const item = this.value.splice(index, 1)
      this.value.splice(Math.max(0, index - 1), 0, item[0])
    },

    moveDown(index) {
      const item = this.value.splice(index, 1)
      this.value.splice(Math.min(this.value.length, index + 1), 0, item[0])
    },
  },

  computed: {
    finalPayload() {
      return this.value.map(repeatable => {
        const formData = new FormData()
        const fields = {}

        repeatable.fields.forEach(f => f.fill && f.fill(formData))

        for (const pair of formData.entries()) {
          fields[pair[0]] = pair[1]
        }

        return { type: repeatable.type, fields }
      })
    },
  },
}
</script>
