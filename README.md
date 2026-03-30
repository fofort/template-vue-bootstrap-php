# PHP + VUE template

This template should help get you started developing with Vue 3 in Vite.

## Requirement
All these are necessary tool for windows
- Yarn (https://yarnpkg.com/)
- Git (https://git-scm.com/downloads)
- Wamp (https://www.wampserver.com/) which include php,mysql and apache server
- sqliteBroswer (https://sqlitebrowser.org/) Optional for local dev use in order to browse db

## Recommended IDE Setup

[VSCode](https://code.visualstudio.com/) + [Volar](https://marketplace.visualstudio.com/items?itemName=Vue.volar) (and disable Vetur).

## Type Support for `.vue` Imports in TS

TypeScript cannot handle type information for `.vue` imports by default, so we replace the `tsc` CLI with `vue-tsc` for type checking. In editors, we need [Volar](https://marketplace.visualstudio.com/items?itemName=Vue.volar) to make the TypeScript language service aware of `.vue` types.

## Customize configuration

See [Vite Configuration Reference](https://vite.dev/config/).

## Project Setup

```sh
yarn
```

### Compile and Hot-Reload for Development

```sh
yarn dev
```

### Type-Check, Compile and Minify for Production

```sh
yarn build
```

### Run Unit Tests with [Vitest](https://vitest.dev/)

```sh
yarn test:unit
```

### Lint with [ESLint](https://eslint.org/)

```sh
yarn lint
```

### build for php

```sh
yarn build-php
```

### run php

```sh
yarn php
```


### run local on phpserver with prod data

go to www folder and run this command : php -S localhost:8000

### with wamp
this will be use for testing as prod env

folder WWW will serve for php server and all relevant file are inside