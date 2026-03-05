import { Request, Response, NextFunction } from 'express'

const axios = require('axios')

function caller(req: Request, res: Response, next: NextFunction) {
    const url = "//"+req.body.imageUrl
    const url1 = req.body['imageUrl'] + 123

    // ruleid: axios-ssrf
    axios.get(url)

    // ruleid: axios-ssrf
    axios.get(url+123)
    
    // ruleid: axios-ssrf
    axios.get(`${url}/fooo`)
    
    // ruleid: axios-ssrf
    axios.get("https://"+url)

    // ruleid: axios-ssrf
    axios.get(url1+123)
    
    // ruleid: axios-ssrf
    axios.get(`${url1}/fooo`)
    
    // ruleid: axios-ssrf
    axios.get("https://"+url1)

    badNormal(url)
    badNormal1(url1)
    badReceiveReq(req)
}

function badNormal (url) {
    // ruleid: axios-ssrf
    axios.get(url)
}

function badNormal1(url) {
    // ruleid: axios-ssrf
    axios.get(url+123)
    
    // ruleid: axios-ssrf
    axios.get(`${url}/fooo`)
    
    // ruleid: axios-ssrf
    axios.get("https://"+url)
}

function badReceiveReq(req: Request) {
    // ok: axios-ssrf
    axios.get(`https://reddit.com/${req.query.url}/fooo`)
    // ok: axios-ssrf
    axios.get("https://google.com/"+req.query.url)
    // ok: axios-ssrf
    axios.get(config_value.foo+req.query.url)
    // ok: axios-ssrf
    axios.get(config_value.foo+req.body.shouldalsonotcatch)
    // ok: axios-ssrf
    axios.get(config_value.foo+req)

    // ruleid: axios-ssrf
    axios.get(req.body.url)
    // ruleid: axios-ssrf
    axios.get(`${req.query.url}/fooo`)
    // ruleid: axios-ssrf
    axios.get("//"+req.query.url+config_value.url)

    const a = req.body.url
    // ruleid: axios-ssrf
    axios.get(a)

    // ruleid: axios-ssrf
    axios.get(a+config_value.url)

    // ok: axios-ssrf
    axios.get(c+a)
    // ok: axios-ssrf
    axios.get(`${c}${a}/fooo`)
    // ok: axios-ssrf
    axios.get(c+a+config_value.url)

    // ok: axios-ssrf
    axios.get(c)
    // ok: axios-ssrf
    axios.get(`${c}`)
    // ok: axios-ssrf
    axios.get(c+config_value.url)

    // ruleid: axios-ssrf
    axios.get(req.body['url'])
    // ruleid: axios-ssrf
    axios.get(`${req.body['url']}/fooo`)
    // ruleid: axios-ssrf
    axios.get(req.body['url']+config_value.url)

    // ruleid: axios-ssrf
    axios.get(`https://${req.body['url']}/fooo`)
    // ruleid: axios-ssrf
    axios.get("https://"+req.body['url']+config_value.url)
    // ruleid: axios-ssrf
    axios.get("//"+req.body['url']+config_value.url)
    // ok: axios-ssrf
    axios.get("//"+c+req.body['url']+config_value.url)
    // todo: axios-ssrf
    axios.get("https://google.com"+req.query.url)
}


function badWithTypes () {
  return ({ body }: Request, res: Response, next: NextFunction) => {
    const url = body.url
    // ruleid: axios-ssrf
    axios.get(url)
  }
}

function goodWithTypes () {
  return ({ params, query, session }: Request, res: Response, next: NextFunction) => {
    const url = session
    // ok: axios-ssrf
     axios.get(url)
  }
}