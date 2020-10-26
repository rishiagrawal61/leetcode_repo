# leetcode_repo

A minimal collection of algorithm / LeetCode-style solutions and small design-pattern examples. The repository is a workspace for solutions in Java, Go, PHP and pattern examples. Currently the repo root may be empty; some Java solutions exist elsewhere in your workspace and can be moved here.

## Repository layout (recommended)
- Java/                — Java solutions (one problem per file or package)
- Go/                  — Go solutions (single-file LeetCode style functions)
- php/                 — PHP solutions and scripts
- Design-Patterns/     — Small examples (Singleton, Factory, etc.)
- tests/               — Optional unit tests or small harnesses
- README.md            — This file
- LICENSE              — Add if you want to set reuse terms

## Quick run / build
- Java (single file)
  - Compile: javac Java/YourSolution.java
  - Run: java -cp Java YourSolution
- Java (packages / multi-file): use Maven/Gradle or compile with javac and run with proper classpath.
- Go
  - Create a small main that calls the function, then: go run path/to/main.go
- PHP
  - Run scripts: php php/your_script.php

## How to add solutions
- Place each solution under the appropriate language folder.
- Prefer one problem per file and include a small runnable example (main() or simple test).
- Name files clearly (include LeetCode number/title in filename or top comment).

## Notes
- If this repo appears empty at the root, move or copy your Java solution files from elsewhere in the workspace into Java/.
- I can help: scan your workspace for Java solution files and propose which to move, or create simple main/test wrappers for any solution.

## Contributing
- Fork, add solutions, include a short example or test, and open a PR with a brief description.

## License
- No license file included. Add a LICENSE if you want to clarify reuse.

