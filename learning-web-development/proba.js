// // "use strict";

// // // Class the will let us create a new node
// // class Node {

// //     constructor(data) {
// //       this.data = data;
// //       this.next = null
// //     }

// //   }
  
// //   class LinkedList {

// //     constructor() {
// //       this.head   = null;
// //       this.tail = null;
// //       this.length = 0;
// //     }
    
// //     add(data) {
// //       const nodeToAdd = new Node(data);
// //       let nodeToCheck = this.head;
  
// //   if(!nodeToCheck) {
// //         this.head = nodeToAdd;
// //         this.length++;
  
// //   return nodeToAdd;
// //       }
  
// //  // Get the last node
// //   while(nodeToCheck.next) {
// //         nodeToCheck = nodeToCheck.next;
// //       }
  
// //    // Make the connection between the last nod and the new node   
// //   nodeToCheck.next = nodeToAdd;
// //       this.length++;
// //       return nodeToAdd;

// //     } // End of add() function
  
// //   get(num) {
// //       let nodeToCheck = this.head;
// //       let count = 0;
      
// //       if(num > this.length) return "Doesn't Exist!"
      
// //       while(count < num) {
// //         nodeToCheck = nodeToCheck.next;
// //         count++;
// //       }
      
// //       return nodeToCheck;
// //     }
  
// //   remove(num) {
// //       let nodeToCheck = this.head,
// //           count       = 0,
// //           prevNode    = null;
      
// //       if(num > length) return "Doesn't Exist!"
      
// //       if(num === 0) {
// //         this.head = nodeToCheck.next;
// //         this.length--;
        
// //         return this.head;
// //       }
      
// //       while(count < num) {
// //         prevNode = nodeToCheck;
// //         nodeToCheck = nodeToCheck.next;
// //         count++;
// //       }
      
// //       prevNode.next = nodeToCheck.next;
// //       nodeToCheck = null;
// //       this.length--;
      
// //       return this.head;
// //     }
    
// //     // Print all the keys from the list
// //     printAll() {
      
// //      // Start with the first node 
// //      let temp = this.head;

// //       while(temp) {
// //         console.log(temp.data);
// //         temp = temp.next;
// //       }

// //     }

// //     // Get the sum of all keys in the list
// //     getSum() {
    
// //       // Start from the list head
// //       let temp = this.head;
      
// //       let sum = 0;

// //       // Loop through the list nodes
// //       for(;temp;temp = temp.next) {
// //         sum += temp.data
// //       }

// //       // return the sum
// //       return sum;

// //     }

// //     addByMe(data) {

// //         // Create the new node
// //         let newNode = new Node(data);
        
// //         // Check whether the list has already been created
        
// //         if(!this.head) {

// //           // The list has not been created yet
// //           this.head = newNode;
// //           this.tail = this.head; // Since it is the first node, it is also the last node

// //           return this.head;
// //         }else {

// //           // The list has already been created
// //           this.tail.next = newNode; // Make the connection between the last node and the new node that will be added
// //           this.tail = newNode; // The new node becomes the last in the list
// //           this.tail.next = null; // There is nothing after the last node

// //         }

// //     }


// //   } // End of class

// //   let list =  new LinkedList();
// //   list.add(100);
// //   list.add(200);
// //   list.add(300);
// //   list.add(400);
// //   // console.log(list.add(300));
// // list.printAll();
// // console.log(list.getSum());

// // console.log("-------------");

// // let list2 = new LinkedList();
// // list2.addByMe(1);
// // list2.addByMe(2);
// // list2.addByMe(3);
// // list2.addByMe(4);
// // list2.printAll();


// /**
//  * Problema 3/52 din Manual cls IX
//  * 
//  * -cerinta- -aici ai scrie cerinta..pe scurt
//  *
//  *  
//  */

//  // Prespunem ca avem deja 3 numere (deocamdata nu stim cu input interactiv, din consola)
//  var a = 9,
//      b = 1,
//      c = 3;
//     //  c = 0; 

// // Punem numerele in vector
// var arr = []; // Asa declaram un empty array

// // Adaugam nr in vector
// arr.push(a);
// arr.push(b);
// arr.push(c);

// console.log(arr);

// // Intai verificam daca exista sau nu nr nule

// var existaNule = false;

// // Parcurgem vectorul pt a vedea daca exista valori nule in el
// // daca exista, setam variabila "existaNule" true

// arr.map(function(value) {
//     if(value === 0) // Daca am gasit o valoarea nula.. setam true pt existaNule
//         existaNule = true;
// });

// // In functie de valoarea lui existaNule, facem ce ne cere problema
// console.log("exista nule ?", existaNule);

// // Luam cele 2 cazuri ale problemei
// if(existaNule) {

//     // Se cere sa afisam numerele din input in ordine descrescatoare

//     //! TEMA : ordonarea desc a elem din vector, apoi transormarea in numar
//     //VARIANTA - Aici e varianta cu toate cifrele alipite - dar nu e cerinta problemei
//     // var str = arr.join('');
//     // console.log(str);
    
//     // var arr = str.toString() // Transform in string
//     //     .split('') // Transformam in array, de genul: ["1", "2", "3", "4"]
//     //     .map(function(valCurenta){ // valCurenta este fiecare element din array pe rand
//     //         // returnam modificarea
//     //         return Number(valCurenta);
//     //     }); // Am transformat fiecare string in numarul coresponzator    
//     // console.log(arr);
//     // arr.sort(function(a,b){
//     //     // return a-b = crescator
//     //     return b-a;
//     // });
//     // console.log(arr);
    
//     arr.sort(function(a,b){       
//         return b-a;  
//     });
//     console.log("Se afiseaza numerele in ord descrescatoare:", arr);
// }else {

//     // Se cere sa se calculeze media geometrica a numerelor introduse

//     // Luam intai lungimea vectorului
//     var rank = arr.length;
//     console.log("ordinul radicalului:", rank);
//     //calculam media geometrica, folosind: Math.pow(x,y), adica radacina de ordinul rank din produsul nr introduse;
//     var medGeo = Math.pow((a*b*c), 1/rank);
//     console.log("Media geometrica este:", medGeo);
//     // Determinam produsul elementelor
    
//     //* Varianta 1 - folosind for loop

//     //* Varianta 2 - folosind functia reduce() 

//     //Sorry, am ales varianta mai usoara. Ramane in vizor si celelalte metode :)
// }


// //* pt citire automata
// // // Din input avem nr n;
// // var n;
// // //Citim n (din consola/input/prompt())
// // // n capata o valoare
// // n = 5;

// // var x;
// // // i contor care tine nr pasilor pe care ii avem de facut
// // for(var i = 1; i<=n; i++) {
// //     //... citim pt fiecare iteratie = vom citi deci n numere
// //     // am citit x;
// //     // adaugam in vector pe x
// //     arr.push(x);
// // }




// function chooseBestSum(t, k, ls) {
//     var biggestCount = 0;

//     var recurseTowns = function(townsSoFar, lastIndex) {
//       townsSoFar = townsSoFar || []; // Initially is an empty array
//       //base case
      
//       if (townsSoFar.length === k) {
//         console.log("gasit",lastIndex + " " +  townsSoFar);


//         var sumDistance = townsSoFar.reduce((a,b)=>a+b);

//         if (sumDistance <= t && sumDistance > biggestCount) {
//           biggestCount = sumDistance;
//         }
             
//         return; //EJECT
   
//     }
    
//       //recursive case
//       // lastIndex + 1 pt a evita o functie in plus care sa verifice
//       for (var i = lastIndex + 1 || 0; i < ls.length; i++) {
//         console.log(lastIndex + " " +  townsSoFar);  
//         recurseTowns(townsSoFar.concat(ls[i]), i);
      
//     }
//     }
//     recurseTowns();
    
//     return biggestCount || null;
//   }

// Link to the task : http://www.codewars.com/kata/the-observed-pin/train/javascript
 
// function getPINs(observed) {

//     var adjacent = [
//         /* 0 */ [0, 8],
//         /* 1 */ [1, 2, 4],
//         /* 2 */ [1, 2, 3, 5],
//         /* 3 */ [2, 3, 6],
//         /* 4 */ [1, 4, 5, 7],
//         /* 5 */ [2, 4, 5, 6, 8],
//         /* 6 */ [3, 5, 6, 9],
//         /* 7 */ [4, 7, 8],
//         /* 8 */ [5, 7, 8, 9, 0],
//         /* 9 */ [6, 8, 9]
//       ];

//       console.log([1,2,4].reduce((acc2,itm2) => {
            
//         return acc2.concat([''].map((x) =>{

//             return  '' + itm2 + x;

//         }));

//     },[]));

//       return observed.split('') // Convert into an array
//       .map(item => adjacent[item]) // Get the adjacent digit for every digit in the original array
//       .reduce((acc,itm)=>{ // acc -  the accumulator; if we have [[1,2,4],[1,2,4]]; after the first iteration, the acc will become : ['1','2',3']

//         console.log("acc : ",acc);
//         console.log("itm : ",itm);
        
//         // Loop through every itm array
//         // The return value will be in array
//         return itm.reduce((acc2,itm2) => {
            
//             return acc2.concat(acc.map((x) =>{ // "acc" will store the digits

//                 return  '' + itm2 + x;

//             }));

//         },[]); // Empty because we will keep adding elements to it

//       },['']); // Because we will have to map that, and it must have somoe kind of value


// }


 


// var expectations = {
//     // "8": ["5", "7", "8", "9", "0"],
//      "11": ["11", "22", "44", "12", "21", "14", "41", "24", "42"]//,
//     //  "369": ["339","366","399","658","636","258","268","669","668","266","369","398","256","296","259","368","638","396","238","356","659","639","666","359","336","299","338","696","269","358","656","698","699","298","236","239"]
//   };

//   for(var pin in expectations)
//         console.log(getPINs(pin));


// function largestReactangle(arr) {
    
//     let stack =  [],
//         i = 0,
//         maxArea = 0,
//         area = 0

//     while( i < arr.length) {

//         if(stack.length === 0  || arr[stack[stack.length-1]] <= arr[i]) {
//             stack.push(i++)
//         }else {

//             let top_stack = arr[stack[stack.length-1]]
//             stack.pop()
//             area = top_stack * (stack.length === 0 ? i : i - stack[stack.length-1] - 1)
//             maxArea = area > maxArea ? area : maxArea

//         }

//     }

//     while(stack.length !== 0) {

//         let top_stack = arr[stack[stack.length-1]]
//         stack.pop()
//         area = top_stack * (stack.length === 0 ? i : i - stack[stack.length-1] - 1)
//         maxArea = area > maxArea ? area : maxArea

//     }

//     return maxArea

// }


// // console.log(largestReactangle([6, 2, 5, 4, 5, 1, 6])) // 12
// // console.log(largestReactangle([4,2,3,5])) // 8


// console.log(parseInt('0x16',16))
// console.log(parseInt(22,10).toString(16))

 


//! DE VAZUT 

//! Better Memoization


//! https://developer.mozilla.org/en-US/docs/Web/API/Node

 
//! https://davidwalsh.name/essential-javascript-functions


// var parts = "user.name.lastName=andrei".split("=");
// console.log(parts)
// // parts[0].split(".").reduce((acc,item,index,arr)=>{

//     acc[item] = {};
//     return acc[item];

// },obj);

// console.log(obj)

// let obj1 = {}

// obj1["name"] = {}
// obj1["name"]["firstName"] = {}
// obj1["name"]["firstName"] = "andrei"

// console.log(obj1)


// let arr = [1,2,3,4,5,6,7]
// console.log(arr.slice(0,4))


// let map = new Map();

// map.set(1,0);
// map.set(2,0);
// map.set(3,0);

// // map.get(1)++;


// val  =map.get(1)
// console.log(val)
// val++;
// val++;
// map.set(1,val);
// console.log(map.get(1))


// // Find common letters of 2 given strings

// function commonLetters (s1,s2) {
//     const letters1 = {}
//     s1.split('').reduce((freq,character)=> {
//         freq[character] = -~freq[character];
//         return freq;
//     },letters1);

//     const letters2 = {}
//     s2.split('').reduce((freq,character)=> {
//         freq[character] = -~freq[character];
//         return freq;
//     },letters2); 

//     // An object with every string and its letters' occurrences
//     // return {letters1,letters2};

//     let ch;
//     for(var i =0; i <=25; i++ ) {
//         ch = String.fromCharCode(i + 97);
//         if(letters1[ch] && letters2[ch]) {
//             console.log(ch) // a, d, m, s
//         }
//     }

// }

// console.log(1)
// let s1 = "asdajdasm";
// let s2 = "dasmkmkqsk";
// commonLetters(s1,s2);


// Square into Squares. Protect trees!

// //? Link to the task : https://www.codewars.com/kata/square-into-squares-protect-trees/solutions?show-solutions=1

// function prime (n, d) {
//     if (n == 1) return 1;
//     if(d == 0) return 0;
//     if(d == 1 ) return 1;
//     if(n % d == 0) return 0;
//     return prime(n,d-1);
// }

// function decompose(n, n2=n*n, i=n, prev) {

//     while(n2 > 0 && i-- > 0) {

//         // prev will become []
//         if(prev = decompose(n,n2 - i*i,i)) {
//             return prev.concat([i]);
//         }
//     }

//     return n2 == 0 ? [] : null;


//   }

//   console.log(decompose(2), null)
//   console.log(decompose(7), [2, 3, 6])
// //   console.log(decompose(123), [2, 3, 6])

// function decompose2(n,n2=n,i=n,prev) {

//     while(i-- >0) {

//         if(prime(i,Math.floor(i/2))) {
//             prev = decompose2(n,n2-i,i)
//             if (prev)
//                 return prev.concat([i]);
//         }

//     }

//     return n2 == 0 ? []:null;

// }
//   console.log(decompose2(21), [2, 3, 6])
//   console.log(decompose2(23), [2, 3, 6])
//   console.log(decompose2(34), [2, 3, 6])


// function Cat(name, color) {
//     this.name = name;
//     this.color = color;
// }

// Cat.prototype.age = 3;
// Cat.prototype.sound = function (){
//     return this.name + " Meoww";
// }

// let fluffy = new Cat("Fluffy","White");
// console.log(fluffy.name) // Fluffy
// console.log(fluffy.color) // White
// console.log(fluffy.age) // 3 
// console.log(fluffy.sound()) // Fluffy Meoww


// let garfield = new Cat("Garfield","Orange");
// console.log(garfield.name); // Garfield
// console.log(garfield.color); // Orange
// console.log(garfield.age) // 3

// // Here we reinitialize the age INSIDE THE CURRENT OBJ
// // So when we ask for the "age", it will first look inside this current object
// // If the property is not found, it will look inside __proto__
// garfield.age = 6;
// console.log(garfield.age) // 6;

// garfield.__proto__.age = 10;
// console.log(garfield.age) // 6;

// // fluffy does not have any age property defined inside the object created
// // So when we request this property, it will return what is in the "__proto__"
// console.log(fluffy.age); // 10

// Validate Sudoku with size NxN

// Link to the task : https://www.codewars.com/kata/validate-sudoku-with-size-nxn/train/javascript

// First alternative
// var Sudoku = function(data) 
// {
   
//   const N = data.length;
//   console.log(N)
//   const M = data[0].length;
//   console.log(M);

// // Check if an element is on a certain line
// function sameLine(row,elem,colToAvoid) {
//     for(let col =0; col < M;col++) {
//         if(data[row][col] === elem && col !== colToAvoid){
//             return true;
//             console.log(1)
//         }
        
//     }
//     return false;
// }

// // Check if an element is on a certain column
// function sameColumn(col,elem,rowToAvoid)  {
//     for(let row = 0; row < N;row++) {
//         if(data[row][col] === elem && row !== rowToAvoid ) {
//             console.log(1)
//             return true;
//         }
//     }
//     return false;
// }

// // 3x3 Table
// function board (startRow,startCol,elem,colToAvoid,rowToAvoid) {
//     for(let i = 0; i < Math.floor(Math.sqrt(N));i++) {
//         for(let j = 0; j < Math.floor(Math.sqrt(M));j++) {
//              if(data[i+startRow][j+startCol] > N && data[i+startRow][j+startCol] <= 0) return false;
//             if(data[i+startRow][j+startCol] === elem && j+startCol !== colToAvoid && i+startRow !== rowToAvoid ) {
//                 console.log(i,j,startRow,startCol,elem)
//                 return true;
//             }
//         }
//     }
//     return false;
// }

//   return {
//     isValid: function() {
//       if( N !== M) return false;
//       if(N==1 && data[0][0] <=0 || data[0][0] !== parseInt(data[0][0],10) || data[0][0] > N) return false;
      
//      for(let i=0; i <N;i++) {
//          for(let j=0; j<M;j++) {
//              if(data[i][j] !== parseInt(data[i][j])) return false;
//              if(board(i - (i % Math.sqrt(N)), j-(j% Math.sqrt(M)),data[i][j],j,i)||
//                 sameColumn(j,data[i][j],i) ||
//                 sameLine(i,data[i][j],j)
//             )
//             return false;
//          }
//      }

//       return true;
//     }
//   };
// };

// var goodSudoku1 = new Sudoku([
//     [7,8,4, 1,5,9, 3,2,6],
//     [5,3,9, 6,7,2, 8,4,1],
//     [6,1,2, 4,3,8, 7,5,9],
  
//     [9,2,8, 7,1,5, 4,6,3],
//     [3,5,7, 8,4,6, 1,9,2],
//     [4,6,1, 9,2,3, 5,8,7],
    
//     [8,7,6, 3,9,4, 2,1,5],
//     [2,4,3, 5,6,1, 9,7,8],
//     [1,9,5, 2,8,7, 6,3,4]
//   ]);

// console.log(goodSudoku1.isValid()) // True

// // Second alternative
// var Sudoku2 = function(data) 
// {
//   //   Private methods
//   // -------------------------
//   function lineOK(arr) {
//     var copy = arr.slice(0);
//     copy.sort(function(a,b) { return a - b; });
//     return copy.every(function(val, idx) { return idx + 1 === val; });
//   }

//   function linesOK(arr) {
//     return arr.every(function(line) { return lineOK(line); });
//   }

//   function columnsOK(arr) {
//     var ok = true;
//     for (var i = 0; i < arr.length && ok; i++) {
//       ok = ok && lineOK(arr.map(function(line) { return line[i]; }));
//     }
//     return ok;
//   }

//   function blocksOK(arr) {
//     // arr - data[][]
//     var ok = true, sqrt = Math.sqrt(arr.length);
//     for (var i = 0; i < sqrt && ok; i++) {
//       // Get the box
//       var sub = arr.slice(sqrt*i, sqrt*(i+1));
//       console.log(arr);
//       for (var j = 0; j < sqrt && ok; j++) {
//         var block = [];
//         for (var k = 0; k < sqrt; k++) {
//           block = block.concat(sub[k].slice(sqrt*j, sqrt*(j+1)));
//         }
//         console.log(block)
//         ok = ok && lineOK(block);
//       }
//     }
//     return ok;
//   }

 

//   //   Public methods
//   // -------------------------
//   return {
//     data: data,
//     isValid: function() {
//     if (Math.sqrt(this.data.length) % 1 != 0) return false;
//     return Math.sqrt(this.data.length) % 1 == 0 && columnsOK(this.data) && blocksOK(this.data) && linesOK(this.data) ;
//     }
//   };
// };
// var goodSudoku2 = new Sudoku2([
//     [7,8,4, 1,5,9, 3,2,6],
//     [5,3,9, 6,7,2, 8,4,1],
//     [6,1,2, 4,3,8, 7,5,9],
  
//     [9,2,8, 7,1,5, 4,6,3],
//     [3,5,7, 8,4,6, 1,9,2],
//     [4,6,1, 9,2,3, 5,8,7],
    
//     [8,7,6, 3,9,4, 2,1,5],
//     [2,4,3, 5,6,1, 9,7,8],
//     [1,9,5, 2,8,7, 6,3,4]
//   ]);

// console.log(goodSudoku2.isValid())


// // Third altenative

// var Sudoku3 = function(data) 
// {
  
//     const N = data.length;
//     console.log(N)
//     const M = data[0].length;
//     console.log(N)

//     // Sum that must be on the row/column and in the box
//     function goodSum(n) {
//         return n === N * (N+1)/2;
//     }   


//   return {
//     isValid: function() {
//     if( N !== M) return false;
//     if(N==1 && data[0][0] <=0 || data[0][0] !== parseInt(data[0][0],10) || data[0][0] > N) return false;

//     let sumRow = [...Array(N)].map(item=>item=0);
//     console.log(sumRow)
//     let sumCol = [...Array(N)].map(item=>item=0);
//     console.log(sumCol)
//     let boxSum = [...Array(Math.sqrt(N))].map(item=>[...Array(Math.sqrt(N))].map(item1=>item1=0));
//     console.log(boxSum)
    
//     for(let i=0; i < N;i++) {
//         // M == N if we got here
//         for(let j=0; j<N;j++) {
//             // Sum on row
//             sumRow[i] +=data[i][j];
//             // Sum on column
//             sumCol[j] += data[i][j];
//             // Sum in the box
//             boxSum[Math.floor(i/Math.sqrt(N))][Math.floor(j/Math.sqrt(N))] += data[i][j];
//         }
//     }

//     console.log(boxSum[1].every(goodSum))
//     for(let i=0; i<3;i++){
//         // If sum in every box is not  N * (N+1)/2
//         console.log(boxSum[i])
//         if(!boxSum[i].every(goodSum)) {
//             return false;
//         }
//     }
//         // Check the same thing on columns and row
//         return (sumRow.every(goodSum) && sumCol.every(goodSum));
//         // return (sumRow.filter(goodSum).length === N && sumCol.filter(goodSum).length === N);
//     }
//   };
// };

// var goodSudoku3 = new Sudoku3([
//     [7,8,4, 1,5,9, 3,2,6],
//     [5,3,9, 6,7,2, 8,4,1],
//     [6,1,2, 4,3,8, 7,5,9],
  
//     [9,2,8, 7,1,5, 4,6,3],
//     [3,5,7, 8,4,6, 1,9,2],
//     [4,6,1, 9,2,3, 5,8,7],
    
//     [8,7,6, 3,9,4, 2,1,5],
//     [2,4,3, 5,6,1, 9,7,8],
//     [1,9,5, 2,8,7, 6,3,4]
//   ]);

// console.log(goodSudoku3.isValid())



// let str = "andrei";

// for(ch of str){
//     console.log(ch);
// }

// for(ch in str) {
//     console.log(ch);
// }
 

// // Reverse a linked list

// class Node {
//     constructor(value) {
//         this.value = value
//         this.next = null
//     }
// }

// class List {
//     constructor() {
//         // Initialize the first node and the last node
//         this.first = null;
//         this.last = null;
//     }

//     add(value) {

//         // If the list has not been created yet
//         if(!this.first) {
//             // Create the list by creating the first node
//             this.first = new Node(value);
//             this.last = this.first;
//         } else {

//             // The list has already been created
//             let nodeToAdd = new Node(value);
//             this.last.next = nodeToAdd;
//             // The node added is now the last node
//             this.last = nodeToAdd;
//         }
//     }

//     getFirstNode() {
//         return this.first;
//     }

//     display(nodeToStart) {
//         let temp = nodeToStart;
//         for(;temp;temp = temp.next) {
//             console.log(temp.value)
//         }
//     }    

//     reverse() {
//         let current = this.first,
//             next = null,
//             prev = null;

//         while(current) {

//             next = current.next;
//             // The current node holds the prev node address
//             current.next = prev;
//             prev = current;
//             current = next
//         }
//         return prev;
//     }

//     reverseRec(nodeToStart) {
//         // Base case
//         if(!nodeToStart || !nodeToStart.next) {
//             return nodeToStart;
//         }

//         // At first, result will be the last node in the list
//         let result = this.reverseRec(nodeToStart.next);

//         // nodeToStart is the node before "result"
//         // nodeToStart holds the address of the next node
//         // Make the "result" node to hold the address of this "nodeToStart"
//         nodeToStart.next.next = nodeToStart;

//         // nodeToStart is nos the last element
//         nodeToStart.next = null;

//         return result;
//     }

// }


// const list =  new List();
// list.add(1);
// list.add(2);
// list.add(3);
// list.add(4);

// list.display(list.getFirstNode()); // 1 2 3 4

// // reverse() returns the last node which is now the first node in the list
// let firstNode  = list.reverse();

// list.display(firstNode); // 4 3 2 1

// list.display(list.reverseRec(firstNode)) // 1 2 3 4 



// class Stream {
//     constructor(head,tail) {
//         Object.assign(this,{head,tail});
//     }

//     inspect() {
//         return JSON.stringify(this,null,2);
//     }

//     getHead() {
//         return this.head
//     }

// }

// st =  new Stream(2,10);
// console.log(st)
// console.log(st.getHead())

// // Destructuring

// // 1)
// let array = [1,2,3,4,5,6,7,8,9,0]
// let {0:a, [array.length - 1] : b,3:c} = array;
// console.log(a) // 1
// console.log(b) // 0
// console.log(c) // 4



// // 2)
// var metadata = {
//     title: 'Scratchpad',
//     translations: [
//        {
//         locale: 'de',
//         localization_tags: [],
//         last_edit: '2014-04-14T08:43:37',
//         url: '/de/docs/Tools/Scratchpad',
//         title: 'JavaScript-Umgebung'
//        }
//     ],
//     url: '/en-US/docs/Tools/Scratchpad'
// };

// let {title:metaTile, translations:[{title:language,locale:loc}],url:myUrl} = metadata
// console.log(metaTile) // Scratchpad
// console.log(language) // JavaScript-Umgebung
// console.log(loc) // de
// console.log(myUrl) // /en-US/docs/Tools/Scratchpad


// // 3) - for of

// var people = [
//     {
//       name: 'Mike Smith',
//       family: {
//         mother: 'Jane Smith',
//         father: 'Harry Smith',
//         sister: 'Samantha Smith'
//       },
//       age: 35
//     },
//     {
//       name: 'Tom Jones',
//       family: {
//         mother: 'Norah Jones',
//         father: 'Richard Jones',
//         brother: 'Howard Jones'
//       },
//       age: 25
//     }
//   ];

// for({name:nume, family:{father:f,mother:m}} of people) {
//     console.log(nume) // Mike Smith Tom Jones
//     console.log(f) // Harry Smith Richard Jones
//     console.log(m) // Jane Smith Norah Jones
// }


// // 4) get the nth element from an array
// let arr = [1,2,3,4,5,6]
// function getElem(n) {
//     // Convert the array into an object
//     const obj = {};
//     for(let i =0; i < arr.length; i++) {
//         obj[i] = arr[i];
//     }
//     n = n -1;
//     let {[n]:elem} = obj
//     return elem 

// } 
// console.log(getElem(4)) // 4
// console.log(getElem(2)) // 2


// // 5) - Unpack fields from objects passed function

// function userId({id}) {
//     return id;
// }

// function whois({displayName,fullName:{firstName:name}}){
//     console.log(displayName + " is  " + name)
// }

// var user = { 
//     id: 42, 
//     displayName: 'jdoe',
//     fullName: { 
//         firstName: 'John',
//         lastName: 'Doe'
//     }
//   };


// console.log('userId: ' + userId(user)); // "userId: 42"
// whois(user); // "jdoe is John"

// // 6)  Computed object property names and destructuring

// let key = 'z';
// let {[key]:foo} = {z:'bar'};
// console.log(foo); // bar

// // 7) Rest in object destructuring
// let {a1, b1, ...rest} = {a1: 10, b1: 20, c: 30, d: 40}
// console.log(a1)
// console.log(b1)
// console.log(rest) // {c: 30, d: 40}


// // Task(show only the number of combinations) :  https://www.codewars.com/kata/counting-change-combinations/train/python



// /**
//  * Write a function that counts how many ways you can change for that for an amount of money, 
//  * given an array of coin denominations.
//  * 
//  * Example {
//  *  1) sum = 4, coins = [1,2]
//  *  Output : 1 1 1 1;  1 1 2; 2 2;
//  * }
//  * 
//  * 
//  * In this case, we are going to count the number of combinations and print each combination
//  * We will use Backtracking in order to achieve that
//  * 
//  * Reasoning : {
//  *  1) Keep adding elements until one of the base cases is encountered
//  *  2) If "money === 0", it means we have a combination; print it.
//  *  3) Each time we go back, we delete that last element in order to get all the combinations
//  * }
//  * 
//  */

// let result = []
// let cnt = 0;
// function getResult(money,coins) {

//     // Base cases
//     if(money < 0 || coins.length === 0 ) {
//         return; // Stop
//     }
//     if(money ===  0) {
//         // Count number of options
//         cnt++;
//         console.log("Option " + cnt );
//         for(elem of result){
//             console.log(elem)
//         }
//         return; // Stop
//     }
    
//     // Start by adding the first element in the coins array
//     result.push(coins[0]);
//     getResult(money - coins[0], coins);
//     result.pop(); // Backtracking
//     getResult(money, coins.slice(1));
// }
 
// getResult(4,[1,2]); 
// console.log(cnt) // 3

// cnt = 0;
// getResult(10, [5,2,3])
// console.log(cnt) // 4

// cnt = 0
// getResult(11, [5,7])
// console.log(cnt) // 0


// // Rearrange array such that arr[i] = i

// // We'll use an array to store the position of the given array

// function rearrange(arr){

//     const len = arr.length;
//     let posArr = []
     
//     // Store the positions
//     for(pos of arr) {
//         console.log(pos)
//         posArr.push(pos);
//     }

//     // Loop through the original array and see if the value at a certaing index is defined
//     for(let i =0 ; i < len; i++) {

//         if(typeof posArr.find((elem) => elem == i) !== 'undefined')
//             arr[i] = i
//         else 
//             arr[i] = -1
//     }

//     // Print the array
//     for(elem of arr) {
//         console.log(elem)
//     }

// }

// const arr = [1, -1, 6, 1, 9,
//     3, 2, -1, 4,-1]
// // rearrange(arr) // -1, 1, 2, 3, 4, -1, 6, -1, -1, 9

// const arr2 =[19, 7, 0, 3, 18, 15, 12, 6, 1, 8,
//     11, 10, 9, 5, 13, 16, 2, 14, 17, 4]  
// rearrange(arr2) // 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19


// Rearrange positive and negative numbers alternatively

// //? Reference :  https://www.geeksforgeeks.org/rearrange-positive-and-negative-numbers-publish/

// /**
//  * Example : {
//  *  arr =  [-1, 2, -3, 4, 5, 6, -7, 8, 9]
//  *  Output : [9, -7, 8, -3, 5, -1, 2, 4, 6]
//  *  
//  * }
//  * 
//  * Reasoning {
//  *  1) We will use the partition process of QuickSort to determine 
//  *    the position from where the arrays contains only positive numbers
//  *  2) Having that position, every element with  i < pos will be negative
//  *  3) Start swapping, by starting from the first negative element(position = 0 ) 
//  * }
//  * 
//  * 
//  */

// function rearrange(arr) {

//     const len = arr.length

//     // QuickSort partition process
//     var j = -1;
//     for(var i = 0; i <  len; i++ ) {
//         if(arr[i] < 0) {
//             j++;
//             // Swap the elements
//             arr[j] = [arr[i],arr[i]=arr[j]][0]
//         }
//     }
//     // j -  the last position of a negative element
    
//     // From here the array contains only positive numbers
//     let pos = j + 1
//     // The start position of negative elements
//     let neg = 0;
//     // let [neg,pos] = [0,j+1]

//     // Swap the elements
//     while(neg < pos && pos < len &&  arr[neg] < 0) {

//         arr[neg] = [arr[pos],arr[pos] = arr[neg]][0]
//         pos++; // Go to the next positive item
//         neg += 2; // Go to the next negative item

//     }

//     return arr;

// }

// const arr =[-1, 2, -3, 4, 5, 6, -7, 8, 9]
// console.log(rearrange(arr)) // [4-3,5,1,6,-7,2,8,9]


//* Logenst subarray having sub at atmost k 

// function getLength(arr,k) {

//     let end = 0,
//         begin = 0,
//         startPos,
//         endPos,
//         sum = 0,
//         maxLength = -1 

//     while(end < arr.length) {

//         // Keep adding elements until the sum does not match the condition
//         if(sum <= k ) {
//             sum += arr[end++]
//         } else {
//             // Start getting rid of elements that are at the beginning
//             sum -= arr[begin++]
//         }

//         // Get the final results
//         if( sum  <= k ) {
//             if(maxLength < (end - begin)) {
//                 maxLength = end - begin
//                 startPos = begin
//                 endPos = end - 1
//             }
//         }

//     }
    
//     return {maxLength, startPos,endPos}

// }

// console.log(getLength([1, 2, 1, 0, 1, 1, 0], 4)) // {maxLength : 5, startPos : 2,endPos : 6}



// let wordRegex = /\b\w{4,}\b/g;
// let text = "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.";

// // Get all the words that contain 4 or more ch
// let res = text.match(wordRegex)
// console.log(text) // Almost the entire text..
// console.log(text.length) // 750

// // Get the words the contain only 3 letters
// let wordRegex2 = /\b\w{3}\b/g;
// let res2= text.match(wordRegex2)
// console.log(res2) // [ 'are','but','the','don','you','are','use','you','isn','the','All',]
// console.log(res2.length) // 19

// // Search by a certain word
// let wordRegex3 = /\b(in)\b/g
// let res3 = text.match(wordRegex3)
// console.log(res3) // [ 'in', 'in' ]
// console.log(res3.length) // 2





// // Generate Parenthesis
// // https://github.com/keon/algorithms/blob/master/algorithms/backtrack/generate_parenthesis.py
// /**
//  * Given n pairs parentheses, generate all combinations of WELL-FORMED parenthesis
//  * 
//  * Example : {
//  * 
//  *  n  = 3 
//  *  Output : 
//  *  
//   "((()))",
//   "(()())",
//   "(())()",
//   "()(())",
//   "()()()"

//  * }
//  * 
//  */


// // n - number of pairs
// function generate(n) {

//     function add_pair(res,s, left, right) {

//         if(left == 0 && right == 0 ) {
//             // Found a new combination
//             res.push(s);
//             return;
//         }
//         if(right > 0) {
//             // Time to add ) if the right is not null
//             add_pair(res,s+ ")",left,right-1);
//         }
//         if(left >0) {
//             // If we add (, we must also add )
//             // So that's why we use right +1
//             add_pair(res,s + "(",left-1,right+1)
//         }

//     }

//     let res = []
//     // right = 0 - we want to start by adding ( first
//     add_pair(res,"",n,0);
//     return res.join("\n")

// }

// console.log(generate(3))



// let arr = []
// for(let i =0; i < 10; i++) {
//     arr.push(Math.floor(Math.random() * 100))
// }

// console.log(arr) // [ 9, 80, 72, 83, 86, 89, 18, 92, 77, 58 ]

// for(let i  =0; i < arr.length; i ++) {
//     for(let  j =0; j < arr.length - i - 1;j++) {
//         if(arr[j] > arr[j+1]) {
//             arr[j] = [arr[j+1],arr[j+1] = arr[j]][0]
//         }
//     }
// }
// console.log(arr) // [ 13, 25, 39, 40, 41, 55, 55, 77, 92, 99 ]

        
                
                


// Answering Tricky JS Interview Questions

// https://www.youtube.com/watch?v=MY0UBGX2FtA&t=547s


//* 1) Explain Event delegation
/*
As js relates to the DOM, it means that if u attach an event listener to a DOM element
that event will fire for every children of that DOM element

This happends through a process called "event bubbling"

"event bubbling"(known as propagation) = comes back up.
events on an element will bubble up to their parents

event.currentTarget.value = the element that has the event attached to it 
event.target = the element that fired the event 


*/ 


// //* 2) Writing a function as a definition/statement or as an expression
// function foo () { // This creates a sort of reference, it's not an actual value; u can't just run it
//     // I am a Definition or Statement
// }

// var bar = function () {
//     // I am an expression
//     // I resolve to a value, event if just "undefined"
// }

// // Expression - any valid unit of code that resolves to a value

// // Why use IIFE - Immediately Invoked Function Expression
// //! In order to control variable scope

// //* Hoisting
// /*
// All variables(var) are declared at the top of any given function scope
// whether you like it or not (INCLUDES FUNCTION DECLARATIONS)
// */

// //! action is already defined
// function hoist(name) {
//     if(name === "Andrei") {
//         var action = "code";
//     }else {
//         var action = "still code";
//     }
//     return action;
// }

// //! What's behind the scenes
// function hoist(name) {
//     var action; // Creates the variable here at the top
//     if(name === "Andrei") {
//         action = "code";
//     }else {
//         var action = "still code";
//     }
    
//     return action;
// }

// // If you write functions as statements - they will be hoisted to the top

// // This works
// function hoist(name){
//     if(name === "Andrei"){
//         action = "code";
//     }else {
//         action = "still code";
//     }

//     var action;
//     return action;
// }
// console.log(hoist("Andrei")) // code

// /*
// * "const" and "let"
// - are not hoisted
// - scoped within the block they are in
// - gives you more control
// */


//todo :
//  https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
// https://developer.mozilla.org/en-US/docs/Web/Security/Same-origin_policy
// https://web.archive.org/web/20160304044218/http://www.json-p.org/
// https://developer.mozilla.org/en-US/docs/Web/HTML/CORS_settings_attributes




// // Generate abbreviations
// // https://github.com/keon/algorithms/blob/master/algorithms/backtrack/generate_abbreviations.py


// /*
// Given a word, generate the list of abbreviations
// word => [1ord, w1rd, wo1d, w2d, 3d, w3 ... etc]
// */

// // Will need to take in consideration the position and the a counter
// function generate_abbr(word) {

//     function generate (result,word,pos,counter,str) {

//         // Base case : when current pos == str.length
//         if(pos == word.length) {
//             console.log(pos)
//             // Check if there is a counter to add
//             if(counter > 0) {
//                 str += counter
//             }
//             result.push(str)
//             return;
//         }

//         if(counter > 0) {
//             // We want to add the counter to the final string
//             // Keep the counter at 0 because we only want to add it once
//             generate(result,word,pos+1,0,str + counter + word[pos])
//         }else {
//             // We don't want to add the counter, just the current letter
//             generate(result,word,pos+1,0,str + word[pos])
//         }

//         // Skip the current word
//         generate(result,word,pos+1,counter+1,str)
//     }   

//     let result = []
//     generate(result,word,0,0,"")
//     return result
// }

// console.log(generate_abbr("word")) 
// /*
// [ 'word',
//   'wor1',
//   'wo1d',
//   'wo2',
//   'w1rd',
//   'w1r1',
//   'w2d',
//   'w3',
//   '1ord',
//   '1or1',
//   '1o1d',
//   '1o2',
//   '2rd',
//   '2r1',
//   '3d',
//   '4' ]
// */
