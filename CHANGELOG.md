# Changelog

## 0.1.0 (2026-09-08)

Full Changelog: [v0.0.1...v0.1.0](https://github.com/crawler-dot-dev/api-sdk-php/compare/v0.0.1...v0.1.0)

### ⚠ BREAKING CHANGES

* replace special flag type `omittable` with just `null`
* remove confusing `toArray()` alias to `__serialize()` in favour of `toProperties()`

### Features

* **api:** api update ([a2a3ada](https://github.com/crawler-dot-dev/api-sdk-php/commit/a2a3adab01202f1067d37e9257bac0d030cf27a2))
* **api:** api update ([07aeeae](https://github.com/crawler-dot-dev/api-sdk-php/commit/07aeeae1e631be421185f93211598ac2f07d7b55))
* remove confusing `toArray()` alias to `__serialize()` in favour of `toProperties()` ([3d0ac66](https://github.com/crawler-dot-dev/api-sdk-php/commit/3d0ac66425ea745fea0df87b579c352ef5b59711))
* replace special flag type `omittable` with just `null` ([8b541f2](https://github.com/crawler-dot-dev/api-sdk-php/commit/8b541f23f3fc211244670742d5ede27e777f0d82))
* **stlc:** configurable CI runner and private-production-repo support in workflow templates ([ae2596b](https://github.com/crawler-dot-dev/api-sdk-php/commit/ae2596bde5b5554e2e8bb08094673a8a31f32182))
* use `$_ENV` aware getenv helper ([8ed7564](https://github.com/crawler-dot-dev/api-sdk-php/commit/8ed7564eb2678776c7c4408a026c0f170617fa5b))


### Bug Fixes

* **ci:** release doctor workflow ([e339b30](https://github.com/crawler-dot-dev/api-sdk-php/commit/e339b30c61415152760db217db37155546af8a0c))
* ensure auth methods return non-nullable arrays ([ed61e4d](https://github.com/crawler-dot-dev/api-sdk-php/commit/ed61e4d9caedd2a0ea09b9088fdd0829789f0ac6))
* inverted retry condition ([ce96284](https://github.com/crawler-dot-dev/api-sdk-php/commit/ce96284a91ac5ca0c4a1fa4732d9c8ef4e4f4456))
* typos in README.md ([f7e9f2f](https://github.com/crawler-dot-dev/api-sdk-php/commit/f7e9f2ffa2abb0f2a66ef7d056ed49594a6c6eaf))
* used redirect count instead of retry count in base client ([c5ec981](https://github.com/crawler-dot-dev/api-sdk-php/commit/c5ec98198b9a9c9dd6b0627a3dac4af9924ae35d))


### Chores

* add git attributes and composer lock file ([230aa50](https://github.com/crawler-dot-dev/api-sdk-php/commit/230aa50592764bf6ff4e240513ac0aff1d719556))
* add license ([35676e9](https://github.com/crawler-dot-dev/api-sdk-php/commit/35676e9c748afb7b89461448dcdfbe549ebda78b))
* **client:** send metadata headers ([1777597](https://github.com/crawler-dot-dev/api-sdk-php/commit/17775975d4915b0d4ddbf6f532ae1ec65ed99b7e))
* configure new SDK language ([e20e74a](https://github.com/crawler-dot-dev/api-sdk-php/commit/e20e74a901849c884f8b99a61f299ba6d10d53e8))
* **internal:** codegen related update ([6acbf3f](https://github.com/crawler-dot-dev/api-sdk-php/commit/6acbf3fccb92976b44669e0fc9b8ef226f13d297))
* **internal:** codegen related update ([8b90234](https://github.com/crawler-dot-dev/api-sdk-php/commit/8b9023499c15b6c1ab4395fb08d5d667ae7f2ede))
* **internal:** codegen related update ([8fc1da9](https://github.com/crawler-dot-dev/api-sdk-php/commit/8fc1da9b843495db1d9f4b97def260c12a020284))
* **internal:** codegen related update ([882155e](https://github.com/crawler-dot-dev/api-sdk-php/commit/882155eda1d2c3b0af0cd8ba3669b406d546f76b))
* **internal:** codegen related update ([558d4d8](https://github.com/crawler-dot-dev/api-sdk-php/commit/558d4d85b4de88bafae236541def23c869bd57c3))
* **internal:** codegen related update ([94a50d8](https://github.com/crawler-dot-dev/api-sdk-php/commit/94a50d8178b79fd43dced9e5ae80401758032a33))
* **internal:** codegen related update ([380db58](https://github.com/crawler-dot-dev/api-sdk-php/commit/380db58237fca7ebcbed4736bf1a310ac55cf116))
* **internal:** codegen related update ([c67d352](https://github.com/crawler-dot-dev/api-sdk-php/commit/c67d3526de0b7cff13aa6ade85bf282599f3df11))
* **internal:** codegen related update ([ee892a9](https://github.com/crawler-dot-dev/api-sdk-php/commit/ee892a9bd730ec63630bc5566abd02afa919f0a5))
* **internal:** codegen related update ([7e98ee5](https://github.com/crawler-dot-dev/api-sdk-php/commit/7e98ee5932977915b4d1bc5c1010add0d8ddf9ef))
* **internal:** codegen related update ([53acded](https://github.com/crawler-dot-dev/api-sdk-php/commit/53acded1a026ebc3f1e47644c7fa99779ef768da))
* **internal:** codegen related update ([57a0176](https://github.com/crawler-dot-dev/api-sdk-php/commit/57a01760ab27ebeb8dc098e587c8f3ba97902ae5))
* **internal:** codegen related update ([9623a2f](https://github.com/crawler-dot-dev/api-sdk-php/commit/9623a2f5e2ccec7caf666eee2eb0ec4c53d4cb09))
* **internal:** ignore stainless-internal artifacts ([18049d1](https://github.com/crawler-dot-dev/api-sdk-php/commit/18049d1fd40d034e5ebc14e182204bea45bfc770))
* **internal:** minor test script reformatting ([623ea81](https://github.com/crawler-dot-dev/api-sdk-php/commit/623ea8164831c2b3cd646b0fb75ca61dcbb73091))
* **internal:** php cs fixer should not be memory limited ([90623d3](https://github.com/crawler-dot-dev/api-sdk-php/commit/90623d3f3d42f0d078f67a5cec79936e356fc969))
* **internal:** remove mock server code ([8d2107b](https://github.com/crawler-dot-dev/api-sdk-php/commit/8d2107b6a50b26d26bb4f0795d6cddf901bf96cc))
* **internal:** update `actions/checkout` version ([d83d638](https://github.com/crawler-dot-dev/api-sdk-php/commit/d83d6386dd245ca843237c248a42eec4f05f982a))
* **internal:** update phpstan comments ([2c197e4](https://github.com/crawler-dot-dev/api-sdk-php/commit/2c197e44fb07bc42aec925a50f97bc61b7ea7054))
* **internal:** upgrade phpunit ([d31842f](https://github.com/crawler-dot-dev/api-sdk-php/commit/d31842f61620a6136b4092ad7c5f5cf946103a08))
* **readme:** remove beta warning now that we're in ga ([2bff4cd](https://github.com/crawler-dot-dev/api-sdk-php/commit/2bff4cd4c35a8e24452c34224bc969e62a86c4d9))
* sync repo ([18f7477](https://github.com/crawler-dot-dev/api-sdk-php/commit/18f74770b67dbbc0362ca3c1997e843c89d27480))
* update mock server docs ([0c23c80](https://github.com/crawler-dot-dev/api-sdk-php/commit/0c23c8044ed1cb29bcf14d809bcca28ffc6d1643))
* update SDK settings ([509d8b8](https://github.com/crawler-dot-dev/api-sdk-php/commit/509d8b82da2165b745493c627e5837c13d6ae1e5))
* update SDK settings ([5a88c06](https://github.com/crawler-dot-dev/api-sdk-php/commit/5a88c06d29d3ef10a64077c00d931d961c73aad2))
* use pascal case for phpstan typedefs ([c3d1a6b](https://github.com/crawler-dot-dev/api-sdk-php/commit/c3d1a6be25c9fedfd3fc24ddfd8e8d879ef9e56c))
