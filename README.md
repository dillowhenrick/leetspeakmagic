# LeetspeakMagic

A powerful and flexible PHP package for encoding and decoding Leetspeak (1337 5p34k) with intelligent context-aware translation.

[![PHP Version](https://img.shields.io/badge/php-%3E%3D8.1-blue)](https://www.php.net)
[![License](https://img.shields.io/badge/license-MIT-green)](LICENSE)

## Overview

LeetspeakMagic provides a robust solution for converting between normal text and Leetspeak, with support for multiple complexity levels and customizable substitution rules. The package features intelligent decoding that can handle ambiguous translations and provide confidence scores for results.

## Requirements

- PHP 8.1 or higher
- Composer

### Code Style

This project uses PHP CS Fixer to maintain code quality:

```bash
# Check code style
./vendor/bin/php-cs-fixer fix --dry-run --diff

# Fix code style issues
./vendor/bin/php-cs-fixer fix
```

## Contributing

Contributions are welcome! Please follow these guidelines:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Write tests for your changes
4. Ensure all tests pass and code style is correct
5. Commit your changes (`git commit -m 'feat: add amazing feature'`)
6. Push to the branch (`git push origin feature/amazing-feature`)
7. Open a Pull Request

Please follow [Conventional Commits](https://www.conventionalcommits.org/) for commit messages.

## Roadmap

- [x] Project setup and configuration
- [ ] Core encoding/decoding functionality
- [ ] Dictionary-based validation
- [ ] Confidence scoring system
- [ ] Multiple preset levels
- [ ] Custom rule support
- [ ] Comprehensive test coverage
- [ ] Performance optimization
- [ ] API documentation
- [ ] Usage examples

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Author

**Whenrick**
- Email: dillowhenrick@gmail.com
- GitHub: [@dillowhenrick](https://github.com/dillowhenrick)

## Acknowledgments

- Inspired by the need for flexible and intelligent Leetspeak conversion in PHP
- Built with modern PHP best practices and design patterns

---

**Note:** This package is currently under active development. The API may change before the 1.0.0 release.
