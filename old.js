//---------------------------------------------------------------------------------------------
//outbound :  تماس هایی که صاحب کسب و کار با کمک خط ثابت خود با مشتری می گیرد.

const express = require('express')
const os = require('os')

const app = express()
const PORT = 4000

app.use(express.json())       // to support JSON-encoded bodies
app.use(express.urlencoded()) // to support URL-encoded bodies

app.post("/outbound/received", (req, res) => {
    var callerId = req.body.CallerId
    var calledNumber = req.body.CalledNumber
    var api = 'received'

    status = 0
    file = 'iman-out-fail_auth.wav'

    if (callerId == '9393834726' || callerId == '9127256506' || callerId == '9173047838' || callerId == '9931504578' || callerId == '2154968000') $
    status = 1
    file = 'iman-in.wav'
}

console.log(`Outbound calls (${api}): ${callerId} --> ${calledNumber}, file: '${file}'`)

res.json({
    status: status,
    file: file
})
})

app.post("/outbound/verify", (req, res) => {
    var callerId = req.body.CallerId
    var calledNumber = req.body.CalledNumber
    var destination = req.body.Destination
    var api = 'verify'

    let cids = {
        '2191340050': {
            '9393834726': '2191340066',
            '9128172212': '2191340051',
            '9394022567': '2191032097'
        }
    }

    var status = 1
    var file = ''
    var cid = ''

    console.log(`Outbound calls (${api}): ${callerId} --> ${calledNumber}, file: '${file}'`)

    if (destination == undefined || destination == '09361212281') {
        file = 'iman-out-fail_auth.wav'
        status = 0
    }

    if (cids[calledNumber] == undefined || cids[calledNumber][callerId] == undefined) {
//iman/    status = 0
        cid = 2191340088

    } else {
        cid = cids[calledNumber][callerId]
    }

    res.json({
        status: status,
        cid: cid,
        file: file,
    })
})

app.post("/outbound/hangup", (req, res) => {
    var api = 'hangup'
    console.log(`Outbound calls (${api}): \n` + JSON.stringify(req.body))
    res.json({
        req: req.body
    })
})

app.listen(PORT, () => {
    console.log(`Web server is listening at port ${PORT}`)
})

//---------------------------------------------------------------------------------------------
//inbound : تماس هایی که مشتری با شماره ثابت کسب و کار میگیرد و برای وی آی وی آر پخش می شود.

const express = require('express')
const os = require('os')

const app = express()
const PORT = 3000

app.use(express.json())       // to support JSON-encoded bodies
app.use(express.urlencoded()) // to support URL-encoded bodies

app.get("/inbound/received", (req, res) => {
    var callerId = req.query.CallerId
    var calledNumber = req.query.CalledNumber
    var api = 'received'

    console.log(`Inbound calls (${api}): ${callerId} --> ${calledNumber}`)
    res.json({
        status: 0,
        file: 'test.wav'
    })
})

app.post("/inbound/received", (req, res) => {
    var callerId = req.body.CallerId
    var calledNumber = req.body.CalledNumber
    var api = 'received'

    status = 0
    file = 'iman-out-fail_auth.wav'

    if (calledNumber == '2191340088') {
        status = 1
        file = 'ivr-mediana-phone.mp3'
    }
    if (calledNumber == '2191340061') {
        status = 1
        file = 'iman-in-3.mp3'
    }

    console.log(`Inbound calls (${api}): ${callerId} --> ${calledNumber}, file: '${file}'`)

    res.json({
        status: status,
        file: file
    })
})

app.post("/inbound/ivr", (req, res) => {
    var callerId = req.body.CallerId
    var calledNumber = req.body.CalledNumber
    var digit = req.body.Digit
    var api = 'ivr'

    let cids = {
        '9152640061': '2191340057',
        '9128172212': '2191340086',
        '9121145739': '2191350057'

    }

    var status = 1
    var file = ''
    var number = number
    var cid = calledNumber

    if (calledNumber == '2191340088') {
        if (digit == '1') {
            number = '9931504578'
        } else if (digit == '2') {
            number = '9931504578'
        } else if (digit == '3') {
            number = '9127256506'
        } else if (digit == '4') {
            number = '9393834726'
        } else if (digit == '5') {
            number = '9152640061'
        } else {
            status = 0
            file = 'invalid-digit.wav'
        }
    } else if (calledNumber == '2191340061') {
        if (digit == '3') {
            number = '9121170087'
        } else if (digit == '8') {
            number = '9124720905'
        } else if (digit == '4') {
            number = '9393834726'
        } else {
            status = 0
            file = 'invalid-digit.wav'
        }
    }

    if (cids[callerId] != undefined)
        cid = cids[callerId]

    console.log(`Inbound calls (${api}): ${callerId} --> ${calledNumber}, file: '${file}'`)

    res.json({
        status: status,
        number: number,
        cid: cid,
        file: file,
    })
})

app.post("/inbound/forward", (req, res) => {
    var callerId = req.body.CallerId
    var calledNumber = req.body.CalledNumber
    var digit = req.body.Digit
    var forwardNumber = req.body.ForwardNumber
    var forwardStatus = req.body.ForwardStatus
    var api = 'forward'

    let forwards = {
        '09394022567': {
            'USER_BUSY': '09055912281',
            'NO_ANSWER': '09055912281'
        },
        '09055912281': {
            'USER_BUSY': '09394022567',
            'NO_ANSWER': '09361212281'
        },
        '9394022567': {
            'USER_BUSY': '09361212281'
        }
    }

    var number = ''
    var status = 1
    var file = ''

    if (forwards[forwardNumber] == undefined || forwards[forwardNumber][forwardStatus] == undefined) {
        status = 0
    } else {
        number = forwards[forwardNumber][forwardStatus]
    }

    console.log(`Inbound calls (${api}): ${callerId} --> ${calledNumber}, forwardNumber: ${forwardNumber}, forwardStatus: ${for$

    res.json({
    status: status,
    number: number,
    file: file,
    })
    })

app.post("/inbound/hangup", (req, res) => {
  var api = 'hangup'
  console.log(`
    Inbound
    calls(${api})
: \n` + JSON.stringify(req.body))
  res.json({
    req: req.body
  })
})

app.listen(PORT, () => {
  console.log(`
    Web
    server
    is
    listening
    at
    port ${PORT}`)
})


