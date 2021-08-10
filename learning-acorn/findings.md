<!-- Created at: 10 apr 2020 -->

* `[^]` - match any character, including newline
  ```ts
  const s = `
  /*

  content inside comment
  
  */
  `;

  s.match(/\/\*([^]*?)\*\//);
  ```

* `regex.lastIndex` - specifies the starting position
  ```ts
  const r = /(foo)/g;
  const s = 'function f (foo) { return foo }'
  r.exec(s)
  (2) ["foo", "foo", index: 12, input: "function f (foo) { return foo }", groups: undefined] // First `foo`
  r.lastIndex++
  r.exec(s)
  (2) ["foo", "foo", index: 26, input: "function f (foo) { return foo }", groups: undefined] // Second `foo`
  ```

* `RegExp.prototype.sticky` - the match starts at `lastIndex`

* `Program === Node`
  * you can provide your own node using `Parser`'s `options`; the future statements will be appended to that `node`

* you can be notified when a token is created: `options.onToken`; (happens in `this.next()`)

* `readToken`
  * `readWord` -> variable name / keyword
  * `getTokenFromCode` -> punctuation -> parse operation! 😃

* `const a = 'bar'` -> `parseIdent`
* `const { a } = { a: 'A' }` -> `parseObj(true)`
  * `{ a }` - `ObjectPattern`

* can be notified when **trailing comma** occurs: `options.trailingComma = () => {}`

## Functions

* function declaration
  ```ts
  function foo (a = 5) {}
  ``` 
  `a = 5` -> left = a; right = 5; `AssignmentPattern`

* nested function declarations
* `f_stat` vs `f_expr` ?
* generator function
* async function

## Questions

* spread 😃
* `MemberExpression` ?
* `locations` property
