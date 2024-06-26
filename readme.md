# ABOUT

This is the additional semgrep rules used in dicoding codebase. This rules reflect the ongoing continuous security research conducted in dicoding.

# USAGE

Make sure you have semgrep installed.

The easiest way is to install it via `pip`

```
# macOS, Linux, or Windows Subsystem for Linux (WSL) users
python3 -m pip install semgrep
```

and then after that just run `make` to run the test.

## USING IT IN YOUR CODE

If you would like to scan your code, you just need to pass in the path of this folder to semgrep.

For example:

```
semgrep scan --config /path/to/this/local/repo
```