.DEFAULT_GOAL := test

test:
	semgrep scan --test --legacy