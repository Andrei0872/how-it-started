// Created at: 10 apr 2020

const a = require('./acorn/dist/acorn')

const inputs = {
  0: `const foo = 'bar'`, // ✔️
  1: `a + b`,
  2: `let o = { a: 'A' }`, // `{` false ❓
  3: `if (true) { console.log(1) }`, // `{` true ❓,
  4: 'ana are `${mere}`', // Template token
  5: 'const sum = (a, b) => a + b', // fn expr ❓
  6: `function foo () { return 'andrei'; }`, // fn stat ✔️
  7: `const foo = { a: 'A', b: 'B' };`, // ✔️
  8: 'const { a } = { a: `Andrei` }', // ✔️
  9: `(1 + 2) / 3`,
  // try catch, return 😃
}

const input = `class Foo extends Bar {}`;

const p = new a.Parser(undefined, input);

console.log(p.parse());
