# Confuser

Do you have automatically incrementing integers as ids? Are those ids exposed in routes and stuff? That pretty much means that anyone can figure out how many of something you have in your application.

Does that matter? Maybe, maybe not.

This package hides the numeric id from plain sight for *most* people. It is a very simple integer obfuscator.

## Usage

```
Confuser::toString(666); // MSYKQWI29A
Confuser::toInt('MSYKQWI29A') // 666
```

Whats happening is the following.

1. Convert the int to a hexadecimal string.
2. Create "the rest" of the string from characters that arent used by hexadecimal.
3. Pad the hexadecimal string with the other string, pad left for even numbers, right for odd numbers.

And the other way.

1. Filter out the characters that are used by hexadecimal.
2. Convert the string to decimal integer.
3. Check the input against the output of toString to remove false positives.
