# Changelog

## 0.1.0 (2026-09-04)

Full Changelog: [v0.0.1...v0.1.0](https://github.com/crawler-dot-dev/api-sdk-php/compare/v0.0.1...v0.1.0)

### ⚠ BREAKING CHANGES

* replace special flag type `omittable` with just `null`
* remove confusing `toArray()` alias to `__serialize()` in favour of `toProperties()`

### Features

* **api:** api update ([a2a3ada](https://github.com/crawler-dot-dev/api-sdk-php/commit/a2a3adab01202f1067d37e9257bac0d030cf27a2))
* **api:** api update ([07aeeae](https://github.com/crawler-dot-dev/api-sdk-php/commit/07aeeae1e631be421185f93211598ac2f07d7b55))
* remove confusing `toArray()` alias to `__serialize()` in favour of `toProperties()` ([3d0ac66](https://github.com/crawler-dot-dev/api-sdk-php/commit/3d0ac66425ea745fea0df87b579c352ef5b59711))
* replace special flag type `omittable` with just `null` ([c6d8c97](https://github.com/crawler-dot-dev/api-sdk-php/commit/c6d8c97854b8b9a0c2c0116f135a1e86032c1844))
* **stlc:** configurable CI runner and private-production-repo support in workflow templates ([259c1b2](https://github.com/crawler-dot-dev/api-sdk-php/commit/259c1b27e19669346ce8b96a9f846beda1429a96))
* use `$_ENV` aware getenv helper ([b1cdf47](https://github.com/crawler-dot-dev/api-sdk-php/commit/b1cdf47882501abfe429886834158455d677fbfa))


### Bug Fixes

* **ci:** release doctor workflow ([e339b30](https://github.com/crawler-dot-dev/api-sdk-php/commit/e339b30c61415152760db217db37155546af8a0c))
* ensure auth methods return non-nullable arrays ([ed61e4d](https://github.com/crawler-dot-dev/api-sdk-php/commit/ed61e4d9caedd2a0ea09b9088fdd0829789f0ac6))
* inverted retry condition ([ce96284](https://github.com/crawler-dot-dev/api-sdk-php/commit/ce96284a91ac5ca0c4a1fa4732d9c8ef4e4f4456))
* typos in README.md ([b92503d](https://github.com/crawler-dot-dev/api-sdk-php/commit/b92503d71e48aecf76beb83c9350b05c51aea922))
* used redirect count instead of retry count in base client ([e17b489](https://github.com/crawler-dot-dev/api-sdk-php/commit/e17b4892534603e5883ba55ba2fd7e42c24bd8e2))


### Chores

* add git attributes and composer lock file ([b83a04a](https://github.com/crawler-dot-dev/api-sdk-php/commit/b83a04a3d82cffea1ef77548d9109b700b6341ca))
* add license ([35676e9](https://github.com/crawler-dot-dev/api-sdk-php/commit/35676e9c748afb7b89461448dcdfbe549ebda78b))
* **client:** send metadata headers ([1777597](https://github.com/crawler-dot-dev/api-sdk-php/commit/17775975d4915b0d4ddbf6f532ae1ec65ed99b7e))
* configure new SDK language ([e20e74a](https://github.com/crawler-dot-dev/api-sdk-php/commit/e20e74a901849c884f8b99a61f299ba6d10d53e8))
* **internal:** codegen related update ([42f5fd7](https://github.com/crawler-dot-dev/api-sdk-php/commit/42f5fd718a0c186f6fdf1aa60b584ebd74611c92))
* **internal:** codegen related update ([65a1145](https://github.com/crawler-dot-dev/api-sdk-php/commit/65a11453c9f653328453787538ee214ccd2102c2))
* **internal:** codegen related update ([cbe1281](https://github.com/crawler-dot-dev/api-sdk-php/commit/cbe128151519619595c8c7457e8863e9db4156e0))
* **internal:** codegen related update ([db46c96](https://github.com/crawler-dot-dev/api-sdk-php/commit/db46c9654ab2153a5487d88c10b64d8dd5f49b3e))
* **internal:** codegen related update ([d03be50](https://github.com/crawler-dot-dev/api-sdk-php/commit/d03be5099a1ef482c011a4e8318800e76805e76a))
* **internal:** codegen related update ([86347f9](https://github.com/crawler-dot-dev/api-sdk-php/commit/86347f9f13872268091730bc30ebb77d2fa2219a))
* **internal:** codegen related update ([2fe2989](https://github.com/crawler-dot-dev/api-sdk-php/commit/2fe2989fab1e6675133d7b8949d5870d70646831))
* **internal:** codegen related update ([cbc579e](https://github.com/crawler-dot-dev/api-sdk-php/commit/cbc579e3c7f278793deafb4beeaa5c60e0e24f69))
* **internal:** codegen related update ([b680cdf](https://github.com/crawler-dot-dev/api-sdk-php/commit/b680cdfa84729163cea9fd85d57f5dea2931078d))
* **internal:** codegen related update ([a835ac2](https://github.com/crawler-dot-dev/api-sdk-php/commit/a835ac241f2f725fdf03b28d8b9c017bc56be45e))
* **internal:** codegen related update ([c3efc61](https://github.com/crawler-dot-dev/api-sdk-php/commit/c3efc61799621a08faa7341655f5e853014f81a1))
* **internal:** codegen related update ([9778e0c](https://github.com/crawler-dot-dev/api-sdk-php/commit/9778e0c49d74011c5238d4a14df6aefa37e1af96))
* **internal:** codegen related update ([83391d1](https://github.com/crawler-dot-dev/api-sdk-php/commit/83391d1c63b4580d8f00051f6c6666eafa79fef0))
* **internal:** ignore stainless-internal artifacts ([c3223c0](https://github.com/crawler-dot-dev/api-sdk-php/commit/c3223c0ffd8506defdb68b2efc61dfe46a562bb8))
* **internal:** minor test script reformatting ([33e8857](https://github.com/crawler-dot-dev/api-sdk-php/commit/33e8857777aa9108221af69bb0abb19afd3eb4fb))
* **internal:** php cs fixer should not be memory limited ([9a28962](https://github.com/crawler-dot-dev/api-sdk-php/commit/9a289623cbcb1dd1209f7f9921a644eb89abf5fa))
* **internal:** remove mock server code ([35d949b](https://github.com/crawler-dot-dev/api-sdk-php/commit/35d949b93ac7f04ebe6cd7efc89cc17e22e89a51))
* **internal:** update `actions/checkout` version ([f3ba50a](https://github.com/crawler-dot-dev/api-sdk-php/commit/f3ba50adbe2b43b218043d47c04d94e8a9f9953a))
* **internal:** update phpstan comments ([8156b83](https://github.com/crawler-dot-dev/api-sdk-php/commit/8156b83e4c03f724926185e1b12f838dc3f7b1ea))
* **internal:** upgrade phpunit ([e3a0029](https://github.com/crawler-dot-dev/api-sdk-php/commit/e3a0029bb5464343ba8708a5a12e63bcff2b6cab))
* **readme:** remove beta warning now that we're in ga ([e1d2979](https://github.com/crawler-dot-dev/api-sdk-php/commit/e1d2979c2af18340bb987ff813b4ed0b68f3ea6c))
* sync repo ([937f0f0](https://github.com/crawler-dot-dev/api-sdk-php/commit/937f0f0ed97f8e73ed11a7a43cc4882bd338232e))
* update mock server docs ([29b3ef1](https://github.com/crawler-dot-dev/api-sdk-php/commit/29b3ef1c121e17bcf0bfe02ecaf7f31ac8ada188))
* update SDK settings ([0e7a5fa](https://github.com/crawler-dot-dev/api-sdk-php/commit/0e7a5fa737a55c530a79df453460599a60ef850f))
* update SDK settings ([5a88c06](https://github.com/crawler-dot-dev/api-sdk-php/commit/5a88c06d29d3ef10a64077c00d931d961c73aad2))
* use pascal case for phpstan typedefs ([c3d1a6b](https://github.com/crawler-dot-dev/api-sdk-php/commit/c3d1a6be25c9fedfd3fc24ddfd8e8d879ef9e56c))
