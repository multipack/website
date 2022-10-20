# [Multipack](https://multipack.co.uk)

A community of web designers and developers in the West Midlands.

This site is built using [Eleventy](https://www.11ty.dev).

## Development

You need to be running Node and the required version is defined in the `.nvmrc`
file. Once you have installed the dependencies using `npm install` you can use
scripts to either run a server or build the project:

```bash
npm run watch
npm run build
```

## Deploying

The website is automatically deployed to Github Pages using the
[`deploy`](/.github/workflows/deploy.yml) workflow.
