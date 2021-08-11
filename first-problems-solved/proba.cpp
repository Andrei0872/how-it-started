
// // // Find common letters of 2 strings

// // #include <iostream>
// // #include <cstring>
// // using namespace std;

// // void commonLetters(char s1[], char s2[]) {

// //     // Use 2 vector to count the occurrences
// //     int *fr1 = new int[26];
// //     int *fr2 = new int[26];

// //     // First string
// //     for(int i  = 0; i < strlen(s1);i++) {
// //         // ~undefined = -1
// //         // ~1 = -2; -~1 = 2 and so on..
// //         fr1[s1[i] - 97] = -~fr1[s1[i] - 97];
// //     }

// //     // Second string
// //     for(int i  = 0; i < strlen(s2);i++) {
// //         fr2[s2[i] - 97] = -~fr2[s2[i] - 97];
// //     }

// //     for(int i =0; i <= 25;i++) {
// //         // If there is a common letter
// //         if(fr1[i] && fr2[i]) {
// //             cout << char(i + 97) <<" ";
// //         }
// //     }
// // }

// // int main (){
    
// //     char s1 [] = "asdajdasm" ;
// //     char s2 [] = "dasmkmkqsk";
// //     commonLetters(s1,s2); // a d m s
// //     return 0;
// // }   


// // Sparse search

// //? Reference : https://www.geeksforgeeks.org/sparse-search/

// /*
// Example : 
//     arr [] = {"for", "geeks", "", "", "", "", "ide", 
//                       "practice", "", "", "", "quiz"}
//     Output : geeks
// */


// // #include <iostream>
// // #include <cstring>
// // using namespace std;

// // int binarySearch(char arr[][100], int low, int high, char word[]) {
// //     // Base case - element does not exist
// //     if(low > high )
// //         return -1;
    
// //     // Get the middle
// //     int mid = (low+high)/2;

// //     // If it is an empty string, we modify a little bit
// //     if(strcmp(arr[mid],"") == 0) {
// //         // Take the immediately left and right positions
// //         int left = mid -1 ;
// //         int right = mid +1;
        
// //         while (1) {

// //             // If we don't find any non-empty strings
// //             if(left < low || right > high) {
// //                 return -1;
// //             }
// //             if(left >= low && strcmp(arr[left],"") != 0 ){
// //                 // We find the actual mid position
// //                 mid = left;
// //                 break;
// //             }
// //             if(right <= high && strcmp(arr[right],"") != 0) {
// //                 mid = right;
// //                 break;
// //             }
// //             // Keep searching
// //             left--;
// //             right++;
// //         } 
// //     }

// //     // Basic Binary Search
// //     if(strcmp(arr[mid],word) == 0) {
// //         // We found the element
// //         return mid; 
// //     }
// //     if(strcmp(arr[mid],word) > 0) {
// //         return binarySearch(arr,low,mid-1,word);
// //     }else return binarySearch(arr,mid+1,high,word); 
// // }

// // int sparseSearch(char arr[][100],int low, int high, char word[]) {
// //     // A little bit modified binary search
// //     return binarySearch(arr,low,high,word);
// // }

// // int main () {

// //     char arr[][100]= {"for", "geeks", "", "", "", "", "ide", 
// //                       "practice", "", "", "", "quiz"};

// //     char word[] = "geeks";
// //     int len = sizeof(arr)/sizeof(arr[0]);

// //     cout << sparseSearch(arr,0,len-1,word); // 1 
// //     return 0;
// // }




// // UBB - Concurs Admitere - Aprilie -2016 - Subiectul 3

// // #include <iostream>
// // using namespace std;

// // // Citirea vectorului de la tastatura
// // int * citire(int *arr, int &n) {
    
// //     cin  >> n;
    
// //     arr = new int[n];
    
// //     for(int i=0; i < n; i++){
// //         cin >> arr[i];
// //     }
// //     return arr;
// // }

// // // Verificarea daca un sir este palindrom sau nu
// // bool palindrom(int arr[], int n) {
 
// //     for(int i=0; i < n/2;i++) {
// //         if(arr[i] != arr[n-i-1])
// //             return false;
// //     }
        
// //     return true;
// // }

// // void nrPermutari(int *arr, int n, int &nrPerm,bool &gasit) {

// //     // Inca nu am gasit nimic
// //     gasit = false; 
// //     int temp;
// //     // Putem verifica daca sirul dat este din prima palindrom
// //     if(palindrom(arr,n)) {
// //         gasit = true;
// //         return;
// //     }else {
// //         // Cat timp nu s a gasit si cat timp nu s-a repetat permutarea
// //         // Folosim asta pt a evita un loop infinit
// //         while(!gasit && nrPerm <= n) {

// //             // Facem permutarile
        
// //             // Retinem primul element
// //             temp = arr[0];
// //             // Schimbam locurile elementelor
// //             for(int j=1; j<n;j++)
// //                 arr[j-1] = arr[j];
// //             // Primul element devine ultimul
// //             arr[n-1] = temp;

// //             // Vedem daca vectorul rezultat din permutare este palindrom
// //             gasit = palindrom(arr,n);

// //             // Marim numarul de permutari ciclice
// //             nrPerm++; 
// //         }
// //     }
// // }

// // void palindromCiclic(int *arr, int n) {
// //     // Vedem daca vectorul sau una din permutarile sale este palindrom si, in caz afirmativ, vom avea si numarul de permutari
// //     int nrPerm = 0;
// //     bool gasit;
// //     nrPermutari(arr, n,nrPerm,gasit);
    
// //     // Daca s-a gasit vreo permutare, afisam mesajul corespunzator si nr de permutari necesare
// //     if(gasit) {
// //         cout << "Da\n";
// //         cout << "Numarul de permutari necesare : " << nrPerm << "\n";
// //     }else {
// //         cout << "Nu\n";
// //     }
// // }


// // int main () {

// //     int *arr;
// //     // Lungimea vectorlui
// //     int n;

// //     arr = citire(arr,n);
// //     palindromCiclic(arr,n);

// //     // Eliberam memoria
// //     delete[] arr;
// //     return 0;
// // }


// // // Se da un numar natural. Extrageti numarul format din cifre impare, in ordinea aparitiilor incepand de la stanga

// // #include <iostream>
// // #include <cmath>
// // using namespace std;

// // // Pentru a determina puterea lui 10
// // int c =0;
// // int rec(int n) {
 
// //     if(n > 0) {
// //         return (n%10) & 1 ? n%10*pow(10,c++) + rec(n/10):rec(n/10);
// //     }else{
// //         c = 0;
// //         return 0; 
// //     } 

// // }


// // int main() {
// //     int n = 2103;
// //     cout << rec(n) << "\n";
// //     cout << rec(2513) << "\n";
// //     return 0;
// // }



// // // pow() alternative
// // #include <iostream>
// // using namespace std;

// // int power(int st, int dr, int a) {

// //     if(st == dr) {
// //         return a;
// //     }
// //     else return power(st,(st+dr)/2,a) *  power((st+dr)/2+1,dr,a);
// // }

// // int power2(int a, int b) {
// //     if(b == 0 ) return 1;
// //     if(b & 1) return a * power2(a,b/2) * power2(a,b/2);
// //     else return power2(a,b/2) * power2(a,b/2);
// // }

// // int main () {
// //     // 2 ^ 3
// //     cout << power(1,3,2) << "\n"; // 8
// //     // 5 ^ 3
// //     cout << power(1,3,5) << "\n"; // 125


// //     cout << power2(2,3) << "\n"; // 8
// //     cout << power2(5,4) << "\n"; // 625

// // }



// // #include <iostream>
// // #include <string>
// // #include <cstring>
// // using namespace std;

// // int main () {
// //     string s  ="andrei";
// //     cout << s.c_str(); // Returns a pointer to an array that contains a null terminated sequence if ch(C string)
// //     char *str = new char[s.length() + 1];
// //     strcpy(str,s.c_str()); // andrei
// //     cout << "\n" << str;


// //     cout << "\n";
    
// //     string s2 = "ANDREI";
// //     char str2[255];
// //     strcpy(str2,s2.data()); // Returns a pointer to the c-string representation of the string object's value
// //     cout << str2 << "\n"; // ANDREI

// // }



// // // C++ priority_queue
// // #include <iostream>
// // #include <queue>
// // #include <vector>
// // using namespace std;

// // int main() {

// //     // Min
// //     priority_queue<int,vector<int>,greater<int>> q;
// //     q.push(30);
// //     q.push(10);
// //     q.push(40);
// //     q.push(50);
// //     q.push(33);

// //     cout << q.size() << "\n";

// //     while(!q.empty()) {
// //         cout << q.top() << " "; // 10 30 33 40 50
// //         q.pop();
// //     }

// //     cout << "\n";

// //     priority_queue<int> q2;
// //     q2.push(30);
// //     q2.push(10);
// //     q2.push(40);
// //     q2.push(50);
// //     q2.push(33);

// //     while(!q2.empty()) {
// //         cout << q2.top() << " "; // 50 40 33 30 10
// //         q2.pop();
// //     }
// //     return 0;
// // }

// // // Implementing Min Heap on a defined class
// // #include <bits/stdc++.h>
// // using namespace std;

// // class Point {

// //     // Private variables
// //     int x,y;
// //     public:
// //         // Construct
// //         Point(int _x, int _y) {
// //             x = _x;
// //             y = _y;
// //         }

// //     int getX() const {return x;}
// //     int getY() const {return y;}

// // };

// // // Compare 2 points
// // class myComparator{
// //     public:
// //         int operator() (const Point &p1, const Point &p2) {
// //             // Min 
// //             return p1.getX() > p2.getX();
// //         }
// // };

// // int main () {

// //     priority_queue<Point,vector<Point>, myComparator> q;

// //     // We add new instances in the heap
// //     q.push(Point(10,2));
// //     q.push(Point(2,1));
// //     q.push(Point(1,5));

// //     // Print the heap
// //     while(!q.empty()) {
// //         // Create a new instance first
// //         Point p = q.top();
// //         cout << p.getX() << " " << p.getY() << "\n";
// //         q.pop();
// //     }
// //     /*
// //     Output : 
// //     1 5
// //     2 1
// //     10 2
// //     */
// //     return 0;
// // }

// // // Print all combinations of N elements such that their sum is divisible  by M

// // /*
// // Reasoning : {
// //     1) Use backtracking to generate all the possible combinations
// //     2) For every array of N elements we verify if their sum is divisible by M
// //     3) If so, we print them, with their sign
// // }
// // */

// // #include <iostream>
// // using namespace std;
 
// // class Generate {
// //     int *arr;
// //     int n; // Array length
// //     int m;

// //     // This will help us generate the arrays
// //     int *st; 

// //     public:
// //         Generate(int _n,int _m){
// //             n = _n;
// //             arr =new int[n];
// //             st = new int[n+1];
// //             m = _m;
            
// //             // Get the user input
// //             for(int i = 0; i < n;i++) {
// //                 cin >> arr[i];
// //             }   
// //         }

// //         // Print solution if the the it's correct
// //         void printSol(){
// //             int s = 0;
// //             // If the element is part of the array, we choose "+", otherwise, "-"
// //             for(int i=0;i < n;i++) {
// //                 if(st[i] == 1) {
// //                     s += arr[i];
// //                 }else s+= (-1 * arr[i]);
// //             }
// //             // If the sum is divisible by M
// //             if(s % m == 0) {
// //                 // Print the solution! 
// //                 for(int i =0; i < n; i++) {
// //                     if(st[i] == 1) {
// //                         cout << "+ " << arr[i] << " ";
// //                     }else cout << "- " << arr[i] << " ";
// //                 }
// //                 cout << "\n";
// //             }

// //         }

// //         void getSolutions(int k) {
// //             // Every generated array has the length of "n"
// //             // If k is greater than n, it means we could have a solution
// //             if(k == n) {
// //                 printSol();
// //             }else{
// //                 // Generate
// //                 for(int i=0;i<=1;i++) {
// //                     // k -  the index of the element
// //                     // i - either 1 or 0 - if the array contains this element
// //                     st[k] = i;
// //                     getSolutions(k+1); //  Search for other elements
// //                 }
// //                 cout << "\n";
// //             }
             
// //         }
// // };



// // int main () {

// //     Generate obj(4,5); // Input : 5, 6, 7
// //     obj.getSolutions(0);
// //     /*
// //     Output : 
// //     -5-6-7
// //     +5-6+7
// //     -5+6-7
// //     +5+6+7
// //     */
// //     cout << "\n";
    

// //     Generate obj2(3,3); // Input : 3, 5, 6, 8
// //     obj2.getSolutions(0);
// //     /*
// //     Output : 
// //     -3-5+6-8
// //     -3+5+6-8
// //     +3-5-6+8
// //     +3+5-6+8
// //     */
// //     return 0;
// // }


// // // Balanced parenthesis

// // //? Reference : https://www.geeksforgeeks.org/check-for-balanced-parentheses-in-an-expression/

// // /**
// //  * Given a string of parenthesis, check if they are balanced
// //  * 
// //  * Example :
// //  *  Input : "{()}[]"
// //  *  Output : YES.
// //  * 
// //  * Reasoning :
// //  *  1) We will use a stack, in which we will add opened parenthesis
// //  *  2) When we encounted a closed bracket, we will check if it matches with the top most value in the stack
// //  *  3) We will also check if the string starts with a closed bracket, which means the parenthesis are not balanced
// //  * 
// //  */

// // #include <iostream>
// // #include <stack>
// // #include <cstring>
// // using namespace std;

// // bool balanced(char *str) {

// //     stack<int> st;
// //     char ch, openedBracket;

// //     for(int i=0, n = strlen(str); i < n; i++) {

// //         // Get the current character
// //         ch = str[i];

// //         // Opened Bracket -  push it into the stack
// //         if(ch == '(' || ch == '[' || ch == '{') {
// //             st.push(ch);
// //             // Search for other character
// //             continue;
// //         }

// //         // If the string started with a closed bracket or anything else but opened bracket
// //         if(st.empty()) {
// //             return false;
// //         }

// //         // Check for a match
// //         switch(ch){
// //             case ')':
// //                 // Get the top value from the stack, which is the last opened bracket
// //                 openedBracket = st.top();
// //                 st.pop();
// //                 // If there is no match, the brackets are not balanced
// //                 if(openedBracket == '[' || openedBracket == '{'){
// //                     return false;
// //                 }
// //                 break;
// //             case ']':
// //                 openedBracket = st.top();
// //                 st.pop();
// //                 if(openedBracket == '(' || openedBracket == '{'){
// //                     return false;
// //                 }
// //                 break;
// //             case '}':
// //                 openedBracket = st.top();
// //                 st.pop();
// //                 if(openedBracket == '(' || openedBracket == '['){
// //                     return false;
// //                 }
// //                 break;
// //         } 

// //     }

// //     // If the stack isn't empty, it means there were some excedent brackets
// //     return st.empty();


// // }

// // int main () {

// //     char str[] = "{()}[]";
// //     cout << (balanced(str) ? "Yes":"No") << "\n"; // Yes

// //     char str2[] = "{{[()({})][]}}";
// //     cout << (balanced(str2) ? "Yes":"No") << "\n"; // Yes
// //     return 0;
// // }



// // // Next greater element

// // //? Reference : https://www.geeksforgeeks.org/next-greater-element/

// // /**
// //  * Given an array, print the next greater element for each element
// //  * 
// //  * The next greater element for "x" is the first greater element on the right side of x in the array
// //  * 
// //  * Example : 
// //  *  Input : 4, 5, 2, 25
// //  *  Output :  4 --> 5
// //  *            5 --> 25  
// // *             2 --> 25
// //  *            25  --> -1 
// //  */

// // #include <iostream>
// // #include <stack>
// // using namespace std;

// // void printNGE(int arr [], int n) {

// //     stack<int> st;

// //     // Start by adding the first element, so we don't have to start with the first element
// //     st.push(arr[0]);

// //     for(int i=1; i < n; i++) {
// //         if(st.empty()){
// //             st.push(arr[i]);
// //             continue;
// //         }

// //         // Start printing the elements while the stack is not empty and the items in the stack have a next greater element
// //         // The case might be : 12 11 13;
// //         while(!st.empty() && st.top() < arr[i]) {
// //             cout << st.top() << " -- > " << arr[i] << "\n";
// //             st.pop();
// //         }

// //         // Add this item to the stack so we can find NGE for it too
// //         st.push(arr[i]);

// //     }
// //     // The remaining items do not have a next greater element
// //     while(!st.empty()) {
// //         cout << st.top() << " -- > " << -1 << "\n";
// //         st.pop();
// //     }

// // }

// // int main () {

// //     // Getting user input
// //     int n;
// //     cin >> n;

// //     int *arr = new int[n];
// //     for(int i=0; i < n; i++ ) {
// //         cin >> arr[i];
// //     }

// //     printNGE(arr,n);

// // }



// // // Reverse an array using recursion
// // #include <iostream>
// // using namespace std;

// // // First alternative
// // void reverse(int arr[], int n,int i) {
// //     if(i < n/2) {
// //         int temp;
// //         temp = arr[i];
// //         arr[i] = arr[n-i-1];
// //         arr[n-i-1] = temp;
// //         reverse(arr,n,i+1);
// //     }
// // }

// // // Second alternative
// // void reverse2(int arr[], int n, int i) {
// //     if(i > -1) {
// //         // "Consume the array"
// //         reverse2(arr,n,i-1);
// //         int temp;
// //         temp = arr[i];
// //         arr[i] = arr[n-i-1];
// //         arr[n-i-1] = temp;
// //     }
// // }


// // int main () {

// //     int arr [] = {1,2,3,4,5,6};
// //     int len = 6;
    
// //     cout << "FIRST ALTERNATIVE\n";

// //     for(int i =0 ; i < len; i++) {
// //         cout << arr[i] << " ";
// //     }

// //     cout << "\n";
// //     reverse(arr,len,0);
// //     for(int i =0 ; i < len; i++) {
// //         cout << arr[i] << " ";
// //     }

// //     cout << "\n-----------------------------\n";
// //     cout << "SECOND ALTERNATIVE\n";
// //     int arr2[] = {3,41,20,311,23,1};
// //     int len2 = 6;

// //     for(int i =0 ; i < len2; i++) {
// //         cout << arr2[i] << " ";
// //     }
// //     cout << "\n";
// //     reverse2(arr2,len2,len2/2-1);
    
// //     for(int i =0 ; i < len2; i++) {
// //         cout << arr2[i] << " ";
// //     }

// //     return  0;
// // }   



// // // Reverse a stack using recursion

// // /**
// //  * Reasoning
// //  * 1) While the stack contains elements, keep removing items 
// //  * 2) When it gets to size 0, add items starting backwards basically..
// //  * 3) This can be done by having another function that inserts an item at the bottom
// //  * 4) This is how it works : {
// //  *  Let's take an example : 1 2 3 4 
// //  *  a) Remove items until the stack is empty
// //  *  b) By using recursion, when the stack's size is 0, the current item will be "4"
// //  *  c) Call the function "insertInStack", which will insert the item at the bottom 
// //  *  d) For further calls, let's say we want to insert "3", but 4 is already in the stack
// //  *  e) We will remove elements until the stack's size is 0, then add "3" and then "4".. and so on
// //  * }
// //  */

// // #include <iostream>
// // #include <stack>
// // using namespace std;


// // stack<int> st;
 


// // void insertInStack(int item) {

// //     // Add the item as the first item in stack, and the add the other items
// //     if(st.size() == 0) {
// //         st.push(item);
// //     } else {
// //         // Keep removing items
// //         int elem = st.top();
// //         st.pop();
// //         insertInStack(item);

// //         // After the first item is added, push the other items
// //         st.push(elem);
// //     }

// // }

// // void reverse() {

 
// //     if(st.size() > 0) {
// //         // Get the item
// //         int item = st.top();
// //         st.pop();
// //         reverse();

// //         insertInStack(item);
// //     }

// // }

// // void printStack(stack<int> st) {
// //     while(!st.empty()) {
// //         cout << st.top() << " ";
// //         st.pop();
// //     }
// // }

// // int main () {

// //     st.push(1);
// //     st.push(2);
// //     st.push(3);
// //     st.push(4);
// //     st.push(5);

// //     printStack(st); // 5 4 3 2 1 
// //     cout << "\n";

// //     reverse();

// //     printStack(st); // 1 2 3 4
// //     return 0;
// // }   



// // // Reverse a list

// // //? Reference : https://www.geeksforgeeks.org/reverse-stack-without-using-extra-space/


// // #include <iostream>
// // using namespace std;

// // struct node {
// //     int val;
// //     node * next;
// // };

// // node *first, *last;

// // void add(int val) {

// //     // If the list has not been created yet
// //     if(!first) {
// //         first =  new node;
// //         first->val = val;
// //         first->next = NULL;
// //         last = first;
// //     } else {
// //         // The list has already been created
// //         node * nodeToadd = new node;
// //         nodeToadd->val = val;

// //         // Connect the last node with this node that will be added
// //         last->next = nodeToadd;
// //         nodeToadd->next = NULL;

// //         // The added node is now the last node
// //         last = nodeToadd;
// //     }
// // }

// // node * reverse() {

// //     node * current, *next, *prev;
    
// //     current = first;
// //     next = NULL;
// //     prev = NULL;
    
// //     while(current) {

// //         // Get the next node
// //         next = current->next;
// //         // Revese the list
// //         current->next = prev;
// //         prev = current;
// //         current = next;
// //     }

// //     return prev;

// // }

// // node * reverseRec(node * first) {

// //     // Base case -  if tehre is only one node, return it
// //     if(!first && !first->next) {
// //         return first;
// //     }

// //     // "Consume" the list
// //     // At first, result will containt the last node in the list
// //     node *result = reverseRec(first->next);

// //     // "first" will be the node before the last one
// //     // Basically make the connection between the last node and the node before the last node
// //     first->next->next = first;
    
// //     // Now, "first" is the last node
// //     first->next = NULL;


// // }

// // void display() {
// //     // Start with the first node
// //     node *temp = first;
// //     while(temp) {
// //         cout << temp->val << " ";
// //         temp  = temp->next;
// //     }
// // }

// // int main () {

// //     add(1);
// //     add(2);
// //     add(3);
// //     add(4);

// //     // Before reverse
// //     display(); // 1 2 3 4 
// //     cout << '\n';

// //     first = reverse();
// //     // First alternative
// //     display(); // 4 3 2 1
// //     cout << "\n";

// //     first = reverse();
// //     display(); // 1 2 3 4



// //     return 0;
// // }   





// // UBB - Concurs Mate-Info - 1 aprilie 2017 - Subiectul 3

// // Prefix

// // #include <iostream>
// // using namespace std;

// // // Matricea, folosim ** pt a crea o matrice avand exact dimensiunile date
// // int **mat, N,M, nr;

// // // Vectorul de frecvente
// // int *fr;

// // void citire() {
// //     // cin >> nr >> M >> N;
// //     nr = 12319;
// //     M = 3; // Linii
// //     N = 4; // Coloane
   
// //     // Setez dimeansiunea vectorului de frecvente
// //     fr = new int[N*M];

// //     // Citirea matricei
// //     mat = new int*[M];
// //     for(int i =0; i < M;i++) {
// //         mat[i] = new int[N];
// //             for(int j = 0; j < N;j++) {
// //                 cin >> mat[i][j];
// //             }
// //     }
// // }

// // void afisareMat() {
// //     for(int i = 0; i< M; i++) {
// //         for(int j =0; j<N;j++) {
// //             cout << mat[i][j] << " ";
// //         }
// //         cout << "\n";
// //     }
// // }


// // int cifraControl(int n) {
// //     return (n-1)%9 +1;
// // }

// // // Puterea primei cifre pt un numar
// // int putere(int nr) {
// //     int p = 1;
// //     while(nr >= p)
// //         p *=10;

// //     return p/10;
// // }

// // // Verificare: prima cifra
// // void prefix(bool &existaPrefix) {

// //     // Parcurgem matricea si memoram frecventa fiecare cifre de control pt fiecare element din matrice
// //     for(int i = 0; i< M; i++) {
// //         for(int j =0; j<N;j++) {
// //             fr[cifraControl(mat[i][j])]++;
// //         }
// //     }

// //     // Determin daca se poate forma prefixul
// //     // Daca prima cifra a numarului nu se poate forma din cifra de control a niciunui nr din matrice ==> nu exista prefix
// //     if(fr[nr/putere(nr)] == 0){
// //         existaPrefix = false;
// //     }


// // }

// // int afisare() {

// //     bool existaPrefix = true;
// //     prefix(existaPrefix);

// //     // Daca nu exista prefixul, afisam mesajul corespunzator
// //     if(!existaPrefix) {
// //         cout << "Nu exista prefix";
// //         return 0;
// //     }

// //     // Daca exista prefix
// //     int prefix = 0;
// //     int p = putere(nr);

// //     while(p > 0 && fr[nr/p%10] !=0) { // Luam fiecare cifra de la stanga la dreapta

// //         prefix = prefix * 10 + nr/p%10;
// //         p /= 10;
// //     }

// //     return prefix;

// // } 
 

// // int main () {

// //     citire();
// //     cout << afisare();
// //     return 0;
// //     // Free memory
// //     delete[] fr;
// //     delete[] mat;
// // }   



 

// // UBB - Concurs Mate-Info - 1 aprilie - 2017 - Subiectul 2

// // #include <iostream>
// // using namespace std;

// // int func(int a, int b, int nr) {
// //     int k(0);
// //     while(b < nr) {
// //         k++;
// //         b+=a;
// //         a = b-a;
// //     }
// //     return k;    
// // }

// // int funcRec(int a, int b, int nr) {
// //     if(b < nr){ 
// //         b+=a;
// //         a = b-a;  
// //         return 1 + funcRec(a,b,nr);
// //     }
// //     else return 0;
// // }

// // int main () {

// //     cout << func(1,0,10) <<  "\n"; // 7
// //     cout << funcRec(1,0,10) <<  "\n"; // 7

// // }

 
// // Given "n" numbers representing nodes' degrees ,check if a graph is undirected or not 

// // #include <iostream>
// // #include <vector>
// // #include <algorithm>
// // using namespace std;

// // vector<int>degrees;

// // // Get user input
// // void getInput() {

// //     int n,element;
// //     cin >> n;

// //     for(int i =0;  i<n;i++) {
// //         cin >> element;
// //         degrees.push_back(element);
// //     }

// // }

// // // Get min and max index
// // vector<pair<int,int>> minMax(){

// //     vector<int> bar (degrees.size());
// //     vector<pair<int,int>> temp;
// //     // Filter the array in order to get rid of 0
// //     vector<int>::iterator it = copy_if(degrees.begin(),degrees.end(),bar.begin(),[](int i) {return i!=0;});

// //     // Resize in order to get the right results
// //     bar.resize(distance(bar.begin(),it));

// //     int minElem = *min_element(bar.begin(),bar.end());

// //     // Avoid case when min == max
// //     // auto minPos = find(bar.begin(),bar.end(),minElem) - bar.begin();
// //     // bar.erase(bar.begin() + minPos);

// //     int maxElem = *max_element(bar.begin(),bar.end());

// //     temp.push_back(make_pair(minElem,maxElem));    
// //     return temp;
// // }

// // // solve function
// // bool solve() {

// //     vector<int> temp;
// //     vector<pair<int,int>> min_max;;
// //     bool ok =true;
// //     int maxValue, minValue, minPos, maxPos;
// //     do{
        
// //         temp  = degrees;
// //         for(auto x:temp){
// //             cout << x << " ";
// //         }
// //         cout << "\n";
// //         // Get min and max index (non-zero min)
// //         min_max = minMax();
// //         minValue = min_max.at(0).first;
// //         cout << "minVal " << minValue << "\n";
// //         maxValue = min_max.at(0).second;
// //         cout << "maxVal " << maxValue << "\n";
// //         // Get their position in the original vector
// //         minPos = find(degrees.begin(),degrees.end(),minValue) - degrees.begin();
// //         cout << "minPos " << minPos << "\n";
// //         maxPos = find(degrees.begin(),degrees.end(),maxValue) - degrees.begin();
// //         cout << "maxPos " << maxPos << "\n";

// //         degrees[minPos]--;
// //         degrees[maxPos]--;

// //         if(minPos == maxPos && count(degrees.begin(),degrees.end(),minValue) != 1 &&  count(degrees.begin(),degrees.end(),minValue) !=0 )
// //             cout << "cout : " << count(degrees.begin(),degrees.end(),minValue);
// //             return true;

// //         for(auto x:degrees){
// //             cout << x << " ";
// //         }
// //         cout << "\n";

        
        
// //         if(temp != degrees) {
// //             cout << "merge";
// //         }else {
// //             cout << "GATA - sunt la fel";
// //             ok = false;
// //         }
        

// //     }while(ok);

// //     cout << "DONE";
// //     return all_of(degrees.begin(),degrees.end(),[](int i ){return i==0;});
// // }

// // int main () {

// //     getInput();
// //     cout << (solve() ? "da":"nu");



 
// //     // vector<int>bar (degrees.size());
// //     // vector<int>::iterator it = copy_if(degrees.begin(),degrees.end(),bar.begin(),[](int i) {return i!=0;});
// //     // bar.resize(distance(bar.begin(),it));
// //     // // cout << bar.size();  


// //     // int minElem = *min_element(bar.begin(),bar.end());
// //     // cout << "min " << minElem << "\n";


 

// // }

// // // Given "n" numbers representing nodes' degrees ,check if a graph is undirected or not 

// // #include <iostream>
// // #include <vector>
// // #include <algorithm>
// // using namespace std;

// // // First - pos
// // // Second - value
// // vector<pair<int,int>>degrees;

// // // Get user input
// // void getInput() {

// //     int n,element;
// //     cin >> n;

// //     for(int i =0;  i<n;i++) {
// //         cin >> element;
// //         degrees.push_back(make_pair(i,element));
// //     }

// // }

// // // Get min and max index -  a pair of pairs
// // pair<pair<int,int>,pair<int,int>> minMax(){

// //     //* Get the index of min and max elem
// //     vector<pair<int,int>> v(degrees.size());
    
// //     bool ok =true;

// //     // Get rid of 0
// //     vector<pair<int,int>>::iterator it = copy_if(degrees.begin(),degrees.end(),v.begin(),[](pair<int,int> elem) {return elem.second !=0;});
// //     v.resize(distance(v.begin(),it));

// //     for(auto x:v) {
// //         cout << x.first << " ";
// //         cout << x.second << "\n";
// //     }

// //     // Get min pos
// //     auto minPos = *min_element(v.begin(),v.end(),[](pair<int,int> i,pair<int,int> j) {return i.second < j.second;});
// //     if(!minPos.second) {
// //         ok = false;
// //     }
// //     cout << "min\n";
// //     cout << minPos.second << " ";
// //     cout << minPos.first << "\n";

// //     // cout << "size : " <<  v.size() << "\n";

// //     if(ok) {
// //     // Delete the min value
// //     int pos = distance(v.begin(),find_if(v.begin(),v.end(),[&minPos](const pair<int,int> &i) {return i.first == minPos.first;}));
// //     cout <<"pos : " <<pos << "\n";
// //     v.erase(v.begin() + pos);
// //     }
// //     // cout << "size : " <<  v.size() << "\n";


// //     // Get max pos
// //     pair<int,int > maxPos = *max_element(v.begin(),v.end(),[](pair<int,int> i,pair<int,int> j) {return i.second > j.second;});
// //     cout << maxPos.second << " ";
// //     cout << maxPos.first << "\n";
// //     if(!maxPos.second) {
// //         ok = false;
// //     }

// //     // A pair of pairs
// //     // vector<pair<pair<int,int>,pair<int,int>>> temp;
// //     // temp.push_back({minPos,maxPos});
// //     if(ok) {
// //         return {minPos,maxPos};
// //     }else {
// //         return {{0,0},{0,0}};
// //     }
// // }

// // bool howManyZeros (pair<int,int> i) { return (i.second!=0); }

// // bool solve() {
// //     pair<pair<int,int>,pair<int,int>> v;
// //     vector<pair<int,int>> temp;
// //     do{
// //         temp  = degrees;

// //         // Get max and min index & value
// //         v = minMax();

// //         // It means all items in the array are 0
// //         if(v.first.second == 0  &&  v.second.second == 0 && v.first.first ==0 && v.second.second == 0) {
// //             return true;
// //         }
// //     // cout << v.first.first << " ";
// //     // cout << v.second.first << " ";
// //     // cout << "\n";

// //     // first.first - min index
// //     degrees[v.first.first].second--;
// //     // second.first - max index
// //     degrees[v.second.first].second--;

    
// //     }while(count_if(degrees.begin(),degrees.end(),howManyZeros) > 1);

// //     for(auto x: degrees) {
// //         cout << x.second << " ";
// //     }
// //     return all_of(degrees.begin(),degrees.end(),[](pair<int,int> i) { return i.second == 0;}) ? true:false;


// // }

 
// // int main () {

    
//     // degrees.push_back(make_pair(0,3));
//     // degrees.push_back(make_pair(1,0));
//     // degrees.push_back(make_pair(2,1));
//     // degrees.push_back(make_pair(3,1));
//     // degrees.push_back(make_pair(4,1));

//     // pair<pair<int,int>,pair<int,int>> v;

//     // v = minMax();

//     // cout << v.first.first << " ";
//     // cout << v.second.first << "\n";


//     // int arr[] = {1,0,0,0,1};

//     // int len = sizeof(arr)/sizeof(arr[0]);

//     // for(int i = 0; i < len ;i++)    
//     //     cout << arr[i] << " ";

//     // int posMax = 0;
//     // int max = arr[0];
//     // for(int i = 1; i < len ;i++) {
//     //     if(max < arr[i]) {
//     //         max = arr[i];
//     //         posMax = i;
//     //     }
//     // }

//     // cout << posMax << "\n"; // 0

//     // int posMin = len-1;
//     // int min = arr[len-1];  
//     // for(int i =len-2;i >=0;i--) {
//     //     if(arr[i] < min && arr[i] !=0 && i !=posMax ) {
//     //         min = arr[i];
//     //         posMin = i;
//     //     }
//     // }

//     // cout << posMin <<"\n";

// }

// //TODO 
// //* https://www.geeksforgeeks.org/stack-data-structure-introduction-program/
// //* https://www.geeksforgeeks.org/sudo-placement-playing-with-stacks/
// //* Sort a stack using recursion

 
//  // Given a number "n", find its closest factorial

//  /**
//   * Example : {
//   *  1) n = 10
//  *      Output : 6(3!)
//      2)
//      n = 22
//      Output : 24(4!)
//   * }
//   * 
//   * 
//   * Reasoning {
//   *  1) Use a function that will determine if its parameter can be written as a factorial
//   *  2) Use a function that will take 2 params:
//   *      - first param - the number "n"
//   *      - second param - 1/-1; this will help us determine the closest factorial
//   * }
//   * 
//  */


// #include <iostream>
// using namespace std;

// bool isFactorial(int n ) {

//     int y = 1, i=1;
    
//     while(y < n) {
//         y *= i; i++;
//     }

//     return (n == y);
// }

// // t can either be 1 or -1
// int closestFactorial(int n, int t) {
    
//     while(!isFactorial(n) && (n > 0)) n += t; 
//     return n;

// }


// int main () {

//     int n = 22;
    
//     // Get the closest factorial
//     // We want to get the min difference
//     if(n - closestFactorial(n,-1) < closestFactorial(n,1) - n) {
//         cout << closestFactorial(n,-1) << "\n";
//     } else {
//         cout << closestFactorial(n,1) << "\n"; // 24
//     }   

//     return 0;
// }

// // Pair the minimum

// //? Link to the task : https://practice.geeksforgeeks.org/problems/pair-the-minimum/0

// /**
//  * Example :
//  * 1) 
//  * n = 2
//  * arr = 5 8 3 9
//  * Output : (3,9)(5,8)
//  * 
// */

// #include <iostream>
// #include <algorithm>
// using namespace std;

// int main () {

//     int T, n;
//     cin >> T; // Number of test cases

//     while(T--) {

//         cin >> n;
//         int arr[2*n];

//         for(int i=0; i < 2*n;i++) {
//             cin >> arr[i];
//         }

//         // Sort the array in order to get the pairs
//         sort(arr,arr+2*n);
//         for(int i=0,j=2*n-1; i < j;i++,j--) {
//             cout << "(" <<  arr[i] << "," << arr[j] << ")";
//         }
//     }


// }




// // K-th missing element

// //? Link to the task : https://practice.geeksforgeeks.org/problems/k-th-missing-element/0

// #include <iostream>
// using namespace std;


// int main () {
    
//     int T;
//     int n,k;
    
//     cin >> T;
//     while(T--) {

//         cin >> n >> k;
//         int  a[n];

//         for(int i=0; i < n;i++) {
//             cin >> a[i];
//         }

//         int i=0,k1=0,elem,j;
//         while(i < n-1 &&  k1 != k){

//             if(a[i+1] != a[i] +1){

//                 for(j = a[i]+1; j < a[i+1] && k1 != k;j++,k1++); 
//                 elem = j-1;
//             }
//             i++;

//         }
//         cout << (k1==k ? elem : -1) << "\n";
//     }
//     return 0;
// }



// // Maximize the sum of selected numbers

// #include <iostream>
// #include <algorithm>
// using namespace std;

// int main () {

//     int T,n;

//     cin >> T;
//     while(T--) {
//         cin >> n;
//         int arr[n];
//         int fr[21];
//         for(int i =0; i < 21;i++,fr[i]=0);

//         for(int i =0 ; i < n; i++) 
//             cin >> arr[i], fr[arr[i]]++;
    
//         int sum = 0;
//         for(int i=20; i >=1;i--) {
//             sum += fr[i] * i;
//             fr[i-1] = max(fr[i-1]-fr[i],0);
//         }   
//         cout << sum << "\n";
//     }


// }

// using namespace std;
// int find(vector<int> arr,int l,int r,int x)
// {
//     while (l <= r)
//     {
//         int mid=l+(r-l)/2;
//          if (arr[mid] == x)
//             return mid;
//          if (arr[mid] > x)
//             l = mid+1;
//          else
//             r = mid-1;
//     }
//     return -1;
// }
// int main()
// {
//     int t;
//     cin>>t;
//     while(t--)
//     {
//         int n;cin>>n;
//         int a;
//         vector<int> v;
//         for(int i=0;i<n;i++)
//         {cin>>a;v.push_back(a);}
//         sort(v.begin(),v.end(),greater<int>());
//         int p=0;
//         int sum=0;
//         while(p<v.size())
//         {
//             sum+=v[p];
//             int val=find(v,0,v.size()-1,v[p]-1);
//             if(val!=-1)
//             v.erase(v.begin()+val);
//             v.erase(v.begin()+p);
//         }
//         cout<<sum<<endl;
//         }
// }


// #include <iostream>
// #include <vector>
// #include <algorithm>
// using namespace std;

// int main () {

//     vector<int> v;
//     v.push_back(1);
//     v.push_back(5);
//     v.push_back(2);
//     v.push_back(9);
//     v.push_back(4);

//     sort(v.begin(),v.end(),greater<int>());

//     for(auto it: v){
//         cout << it << " ";
//     }

// }


// // Rearrange an array such that arr[i] = i

// //? Reference : https://www.geeksforgeeks.org/rearrange-array-arri/

// #include <iostream>
// using namespace std;

// void rearrange(int a[], int n) {

//     for(int i =0 ; i < n; i++) {
//         // If the position has not been already assigned 
//         if(a[i] != -1 && a[i] != i) {

//             int currentElem = a[i];

//             // Check if the position is not vacate
//             while(a[currentElem] != -1 && a[currentElem] != currentElem) {
                
//                 // Get the future position of the current element
//                 int pos = a[currentElem];

//                 // Place the currentElem to its correct position
//                 a[currentElem]  = currentElem;

//                 // Get the correct position for a[i]
//                 currentElem = pos;
//             }

//             // Place the element to its correct position
//             a[currentElem] = currentElem;

//             // Check if we got the correct value
//             if(a[i] != i) {
//                 a[i] = -1;
//             } 
//         }
//     }
// }

// int main () {

//     int arr[] = {-1, -1, 6, 1, 9,
//                 3, 3, -1, 4, -1};
//     int len = sizeof(arr)/sizeof(arr[0]);

//     rearrange(arr,len);

//     for(int i =0 ; i < len ;i++) {
//         cout << arr[i] << " ";
//     }

//     cout << "\n";

// }


// // C++ implementation to find the length
// // of longest subarray having sum k
// #include <bits/stdc++.h>
// using namespace std;

// // function to find the length of longest
// // subarray having sum k
// int lenOfLongSubarr(int arr[], 
// 					int n,
// 					int k)
// {

// 	// unordered_map 'um' implemented 
// 	// as hash table
// 	unordered_map<int, int> um;
// 	int sum = 0, maxLen = 0;

// 	// traverse the given array
// 	for (int i = 0; i < n; i++) {

// 		// accumulate sum
// 		sum += arr[i];

// 		// when subarray starts from index '0'
// 		if (sum <= k)
// 			maxLen = i + 1;

// 		// make an entry for 'sum' if it is
// 		// not present in 'um'
// 		if (um.find(sum) == um.end())
// 			um[sum] = i;

// 		// check if 'sum-k' is present in 'um'
// 		// or not
// 		if (um.find(sum - k) != um.end()) {

// 			// update maxLength
// 			if (maxLen < (i - um[sum - k]))
// 				maxLen = i - um[sum - k];
// 		}
// 	}
    
    
//     // cout << um[sum] << "\n";//
// 	// required maximum length
// 	return maxLen;
// }

// // Driver Code
// int main()
// {
// 	int arr[] = {10, 5, 2, 7, 1, 9};
// 	int n = sizeof(arr) / sizeof(arr[0]);
// 	int k = 15;
// 	cout << "Length = "
// 		<< lenOfLongSubarr(arr, n, k);
		
		
// 	int arr1[] = {1, 4, 45, 6, 10, 19};
// 	int x = 51;
// 	int n1 = sizeof(arr1)/sizeof(arr1[0]);
// 	cout << "Length2 = "
// 		<< lenOfLongSubarr(arr1, n1, x);
	
// 	return 0;
// }



// // /* Driver program to test above function */
// // int main()
// // {
// // 	int arr1[] = {1, 4, 45, 6, 10, 19};
// // 	int x = 51;
// // 	int n1 = sizeof(arr1)/sizeof(arr1[0]);
// // 	int res1 = smallestSubWithSum(arr1, n1, x);
// // 	(res1 == n1+1)? cout << "Not possible\n" :
// // 					cout << res1 << endl;

// // 	int arr2[] = {1, 10, 5, 2, 7};
// // 	int n2 = sizeof(arr2)/sizeof(arr2[0]);
// // 	x = 9;
// // 	int res2 = smallestSubWithSum(arr2, n2, x);
// // 	(res2 == n2+1)? cout << "Not possible\n" :
// // 					cout << res2 << endl;

// // 	int arr3[] = {1, 11, 100, 1, 0, 200, 3, 2, 1, 250};
// // 	int n3 = sizeof(arr3)/sizeof(arr3[0]);
// // 	x = 280;
// // 	int res3 = smallestSubWithSum(arr3, n3, x);
// // 	(res3 == n3+1)? cout << "Not possible\n" :
// // 					cout << res3 << endl;

// // 	return 0;
// // }




// // Map container - an associative container that store elements in a mapped fashion 

// //? Reference :  https://www.geeksforgeeks.org/map-associative-containers-the-c-standard-template-library-stl/

// #include <iostream>
// #include <map>
// using namespace std;

// int main () {

// 	map<int,int> m;

// 	m.insert(make_pair(1,40));
// 	m.insert(make_pair(2,50));
// 	m.insert(make_pair(3,60));
// 	m.insert(make_pair(4,20));
// 	m.insert(make_pair(5,80));
// 	m.insert(make_pair(6,90));
// 	m.insert(make_pair(7,100));

// 	for(auto it : m) {
// 		cout << it.first << " ";
// 		cout << it.second << "\n";
// 	}

// 	if(m.find(3) != m.end()) {
// 		cout << "exists\n";
// 	}else {
// 		cout << "does not exit";
// 	}

// 	// find(k) - returns an iterator to the element with the key "k"
// 	auto it = *m.find(2);
// 	cout << it.second << "\n"; // 50 
	
// 	// erase(k) - delete the element with the key "k"
// 	m.erase(m.find(3));

// 	for(auto it : m) {
// 		cout << it.first << " ";
// 		cout << it.second << "\n";
// 	}

// 	cout << "\n--------------------------------\n";
// 	// Delete multiple elements
// 	m.insert(make_pair(3,60));


// 	m.erase(m.begin(),m.find(3));

// 	for(auto it : m) {
// 		cout << it.first << " ";
// 		cout << it.second << "\n";
// 	}
// 	/*
// 	Output 
// 	3 60
// 	4 20
// 	5 80
// 	6 90
// 	7 100
// 	*/

// 	cout << "\n--------------------------------\n";

// 	// lower_bound (k) returns an iterator to the element that is equivalent to mapped value with key value "k"
// 	// or definitely  will not go before the element with that key
// 	auto it2 = *m.lower_bound(6);
// 	cout << it2.second << "\n"; // 90


// 	m.insert(make_pair(8,90));

// 	// upper_bound(k) returns an iterator to the first  element that is equivalent to  mapped value with key value "k"
// 	// or definitely will  go after that  element

// 	cout << m.upper_bound(6)->first << " "; // 7
// 	cout << m.upper_bound(6)->second << "\n";  // 100

// 	cout << "\n--------------------------------\n";

// 	// Iterating using map iterator
// 	map<int,int>::iterator  i;
// 	for(i = m.begin(); i!= m.lower_bound(6); ++i) {
// 		cout  << i->first <<  " ";
// 		cout  << i->second <<  "\n";
// 	}
// 	/*
// 	Output : 
// 	3 60
// 	4 20
// 	5 80
// 	*/

// 	cout << "\n--------------------------------\n";

// 	map <char,int> m2;

// 	m2.insert(make_pair('o',1));
// 	m2.insert(make_pair('t',2));
// 	m2.insert(make_pair('e',3));

// 	cout <<  m2['t']  << "\n"; // 2

// 	return 0;
// }



// // Longest subarray with sum k

// //? Reference : https://www.geeksforgeeks.org/longest-sub-array-sum-k/

// /**
//  * Example {
//  *  1) 
//  *   arr = {10, 5, 2, 7, 1, 9 }
//  * 	 k = 15 
//  * 	 Output : 4 ({5, 2, 7, 1}) 
//  * 
//  *  2) 
//  * 	arr = {-5, 8, -14, 2, 4, 12}
//  *  k = -5
// *  Output : 5 ({-5, 8, -14, 2, 4})
//  * }
//  * 
// */

// #include <iostream>
// #include <unordered_map>
// using namespace std;

// int getLength(const int arr[],int len,int k) {

// 	int sum = 0,
// 		maxLength,
// 		start,
// 		end;



// 	// Keep track of the sum at each index
// 	unordered_map<int,int> m;

// 	for(int i =0 ; i < len ;i++) {

// 		sum +=arr[i];

// 		// If the current sum has not been added
// 		if(m.find(sum) == m.end()) {
// 			m.insert(make_pair(sum,i));
// 		}

// 		// Get the current max length
// 		if(sum == k ) {
// 			start = 0;
// 			end = i;
// 			maxLength = i+1;
// 		}

// 		// Get the max length
// 		// Check if we can "expand" our length 
// 		// This will help us to get all the possible cases
// 		if(m.find(sum-k) != m.end()) {
// 			if(maxLength < (i - m[sum-k])) {
// 				start = m[sum-k] + 1;
// 				end = i;
// 				maxLength = (i  - m[sum-k]);
// 			}
// 		}

// 	}


// 	cout << "start : " << start << "\n";
// 	cout << "end : " << end << "\n";
// 	return maxLength;

// }

// int main () {

// 	const int arr[] = {10, 5, 2, 7, 1, 9};
// 	const int k = 15;
// 	const int len = sizeof(arr)/sizeof(arr[0]);

// 	//cout << getLength(arr,len,k) << "\n"; // 4; start = 1; end = 4 


// 	const int arr2[] = {-5, 8, -14, 2, 4, 12};
// 	const int k2 = -5;
// 	const int len2 = sizeof(arr)/sizeof(arr[0]);

// 	cout << getLength(arr2,len2,k2) << "\n"; // 5; start = 0; end = 4

// }


// // P(x) = a0*X^n + a1*X^n-1 + an-1*X^n-n+1 + an*x^n-n
// #include <iostream>
// #include <math.h>
// using namespace std;

// // Iterative
// float pol(int n, float a[], float y) {

//     float p = 0;
//     for(int i =0; i <=n; i++) {
//         p += a[i] * pow(y,n-i);
//     }
//     return p;
// }

// // Recursive
// float pol_rec(int index ,int n, float a[], float y) {

//     // Base case
//     if(index == n + 1) {
//         return 0;
//     }else {
//         return a[index] * pow(y,n-index) + pol_rec(index+1,n,a,y); 
//     }

// }

// // Recursive without adding an extra parameter
// float pol_rec_2(int n, float a[], float y) {

//     // We will replace a[i] with 0 in order to skip the elements that have been already added to the sum
    
//     int i = 0; // Current index
//     while(a[i] == 0 && i <=n ) i++; // Get the correct index
    
//     // At a certain point all elements will be 0
//     // This is basically the base case
//     if(i > n) {
//         return  0;
//     }else {
//         float current_value = a[i] * pow(y,n-i);
//         // Make the next element attainable
//         a[i] = 0;
//         return current_value + pol_rec_2(n,a,y);
//     } 

// }

// int main () {

//     float a[] = {1.2,3.3,10,2,5};
//     int n = 5;
    
//     cout << pol(n,a,4) << "\n"; // 2765.6
//     cout << pol_rec(0,n,a,4) << "\n"; // 2765.6
//     cout << pol_rec_2(n,a,4) << "\n"; // 2765.6

//     return 0;
// }


// Concurs Mate-Info - aprilie 2015
// Subiectul 3 - Matrice rara

// /**
//  * Se vau 2 matrice rare, se cere afisarea sumei lor sub forma unul tablou dimensional
//  * 
//  * 
//  * 
//  * Exemplu : {
//  *  n = m = 3
//  * Matricea A
//  * 2 2 2 
//  * 3 3 3
//  * 1 2 5
//  * 3 1 2
//  * 1 3 5
//  * -1-1-1
//  * Matricea B
//  * 3 2 4
//  * 1 2 -5
//  * 2 2 1
//  * -1-1-1 
//  * 
//  * }
//  * 
//  * 
//  * 
// */


// #include <iostream>
// using namespace std;

// struct triplet {
//     int row,
//         col,
//         val;
//     triplet * next;
// };

// triplet * getLastNode(triplet * start) {
//     triplet * temp = start;
//     while(temp->next) temp = temp->next;
//     return temp;
// }

// triplet *  add(triplet * start,int row, int col, int val) {

//     // Create new node
//     triplet * new_node = new triplet;

//     new_node->row = row;
//     new_node->col = col;
//     new_node->val = val;

//     // If the list has not been created yet
//     if(!start) {
//         start = new_node;
//         start->next = NULL;
//         return start;
//     } else {
//         // If the list has been created, get the last node and make the connection
//        triplet *last = getLastNode(start);
//        last->next = new_node;
//        last = new_node;
//        last ->next = NULL;
//     }  

// }


// void printList(triplet * st) {
//     triplet *temp = st;
//     for(;temp;temp=temp->next) {
//         cout << temp->row << " ";
//         cout << temp->col << " ";
//         cout << temp->val << " ";
//         cout << "\n";
//     }
// }

// void getInput(triplet **start1,triplet **start2, int &n, int &m) {
//     // Dimensions of the matrix 
//     cin >> n >> m;

//     // When the next triplet is encounterd : -1-1-1
//     // It means we're going to get the input from the second matrix
//     int breakpoits = 0;
//     int col,row,val;

//     while(1) {

//         if(breakpoits == 2) {
//             break;
//         }
//         cin >> row >> col >> val;

//         // Breakpoint encountered
//         if(row == col && col == val && val == -1) {
//             breakpoits++; continue;
//         }

//         // Deferencing the pointer that points to this pointer... I know how it sounds!
//         // *start = add(*start,etc..)

//         // Determine for which matrix we are getting input
//         if(breakpoits == 0) {
//             // First sparse matrix
//             if(!*start1) {
//                 // The list has not been created yet
//                 *start1 = add(*start1,row,col,val);
//             }
//             else add(*start1,row,col,val);

//         }else if(breakpoits == 1) {
//             // Second sparse matrix
//             if(!*start2) {
//                 // The list has not been created yet
//                 *start2 = add(*start2,row,col,val);
//             }
//             else add(*start2,row,col,val);
//         }

//     }
// }

// // Check if a list has a certain column and row
// int searchInList(triplet * start, int row, int col) {

//     triplet *temp = start;
//     while(temp) {
//         if(temp->row == row && temp->col == col)
//             return temp->val;
//         // Keep searching
//         temp = temp->next;
//     }

//     // Row & Column have not been found
//     return 0;
// }

// void solve() {

//     triplet *start1=NULL, *start2 = NULL;
//     int n,m;
//     // getInput(**startPointer1,**startPointer2) : **startPointer holds the address of start
//     getInput(&start1,&start2,n,m);

//     // Final sparse matrix containing the sum of the other 2 sparse matrix
//     int **finalMatrix = new int *[n]; // Rows
//     for(int i =0;i < n;i++) {
//         // Create a new row
//         finalMatrix[i] = new int[m]; // Number of columns
//         for(int j=0; j < m; j++) {

//             // If a row & col have not been found in any of the 2 lists
//             // c[row][col] = 0

//             // Search for row and col 
//             int value_from_first = searchInList(start1,i+1,j+1);
//             int value_from_second = searchInList(start2,i+1,j+1);
//             finalMatrix[i][j] =  value_from_first + value_from_second;
//         }
//     }

//     // Print the matrix 
//     for(int i =0 ;i < n; i++) {
//         for(int j =0; j < m;j++){
//             cout << finalMatrix[i][j] << " ";
//         }
//         cout << "\n";
//     }
//     delete finalMatrix;
// }


// int main () {

//     solve();

//     return 0;
    
// }


// #include <iostream>
// using namespace std;

// void fun(int **x) {
//     (**x) = 8;
// }

// void fun2(int *x) {
//     *x = 3;
// }

// void fun3(int &x) {
//     x = 3;
// }

// int main () {

//     int x = 3;

//     int *p;
//     p = &x;
//     // cout << *p; // 3
//     // cout << p << "\n"; // 0x7ffcf2a7110c

//     int **p2 = &p;
//     // cout << *p2; // 0x7ffcf2a7110c -  address of the pointer that this pointer points to
//     // cout << **p2; // 3

//     fun(&p);
//     // cout << *p; // 8

//     // Same result without using double pointer
//     int y = 4;
//     fun2(&y);
//     // cout << y; // 3 

//     // Another alternative
//     int z = 1;
//     fun3(z);
//     // cout << z; 3
// }

// // https://www.geeksforgeeks.org/function-pointer-in-c/
// #include <iostream>
// using namespace std;

// void add(int a, int b){
//     cout << a + b << "\n";
// }

// void substract(int a, int b) {
//     cout << a - b << "\n";
// }

// void multiply(int a, int b) {
//     cout << a * b << "\n";
// }

// int main () {

//     // func_ptr_arr : Array of function pointers
//     void(*func_ptr_arr[])(int,int) = {add,substract,multiply};    

//     (*func_ptr_arr[1])(2,3); // -1
//     (*func_ptr_arr[0])(2,3); // 5 
//     (*func_ptr_arr[2])(2,3); // 6

// }



// // Eulerian path and circuit for undirected graph

// // https://www.geeksforgeeks.org/eulerian-path-and-circuit/

// /**
//  * Eulerian Path - path in graph the visits every edge exactly one
//  * Eulerian circuit - Eulerian Path which starts and ends with the same vertex
//  * 
//  * Eulerian Cycle : {
// *   1) All vertices with non-zero degree are connected; Don't care about zero degrees because they dont belong to Eulerian Path
// *   2) All vertices have even degree
//  * }
//  * 
//  * Reasoning : {
//  *  1) All vertices in an Eulerian Path have even degree
//  *  2) Check if the graph is connected
//  *  3) If so, count the number of vertices with odd degrees
//  *  4) If count == 2 : Semi-Eulerian Graph else : Eulerian Graph
//  * }
//  * 
//  */
// //! Semi-Eulerian Graph - Graph the contains an Eulerian Path
// //! Eulerian Graph - Graph that contains an Eulerian Cycle 


// #include <iostream>
// #include <list>
// using namespace std;

// class Graph {

//     int V;
//     list<int> *adj;

//     public:
//         // Constructor
//         Graph(int V) {
//             this->V = V;
//             adj = new list<int>[this->V];
//         }
//         // Destructor
//         ~Graph() { delete [] adj;}

//         // Connect 2 vertices
//         void addEdge(int v, int w);

//         // Check if a graph is connected : all non zero degree must be connected
//         bool isConnected();

//         void DFS_utl(int v, bool *visited);

//         int isEulerian();
// };

// void Graph::addEdge(int v, int w) {
//     adj[v].push_back(w);
//     adj[w].push_back(v);
// }

// void Graph::DFS_utl (int currentNode, bool *visited) {

//     visited[currentNode] = true;
 
//     for(auto adjNode : adj[currentNode]) {
//         if(!visited[adjNode])
//             DFS_utl(adjNode,visited);
//     }

// }

// bool Graph::isConnected() {

//     bool *visited = new bool[this->V];
//     for(int i = 0; i < this->V; i++)
//         visited[i] = false;

//     // Find a vertex with non-zero degree
//     int i;
//     for(i = 0 ; i < this->V; i++)
//         if(adj[i].size() != 0)
//             break;
    
//     // If the graph has no edges
//     if(i == this->V)
//         return true;

//     // Start a DFS from the vertex that has non-zero degree
//     DFS_utl(i,visited);

//     for(int i = 0; i < this->V;i++) {
//         // If there is any node unvisited that has adjacent nodes
//         if(!visited[i] && adj[i].size() > 0)
//             return false;
//     }

//     // The graph is connected
//     return true;
// }       

// int Graph::isEulerian() {

//     if(!isConnected())
//         return false;

//     // Count the number of vertices with odd degree
//     int odd(0);
//     for(int i =0; i < this->V;i++)
//         if(adj[i].size() & 1)
//             odd++;

//     return odd > 2 ? 0 : odd != 0 ? 1:2; 
// }

// void test(Graph &g) {
//     cout << g.isConnected() << "\n";
//     int res = g.isEulerian();
//     if(res == 0 ) {
//         cout << "Graph is not eulerian";
//     }else if(res == 1){
//         cout << "Graph Semi-Eulerian(Eulerian Path)";
//     }else {
//         cout << "Graph is Eulerian";
//     }
// }

// int main () {

//     Graph g1(5);
//     g1.addEdge(1, 0);
//     g1.addEdge(0, 2);
//     g1.addEdge(2, 1);
//     g1.addEdge(0, 3);
//     g1.addEdge(3, 4);
//     test(g1); // Graph Semi-Eulerian(Eulerian Path)

//     cout << "\n--------------------------\n";
    
//     Graph g2(5);
//     g2.addEdge(1, 0);
//     g2.addEdge(0, 2);
//     g2.addEdge(2, 1);
//     g2.addEdge(0, 3);
//     g2.addEdge(3, 4);
//     g2.addEdge(4, 0);
//     test(g2); // Graph is Eulerian

//     cout << "\n--------------------------\n";

//     Graph g3(5);
//     g3.addEdge(1, 0);
//     g3.addEdge(0, 2);
//     g3.addEdge(2, 1);
//     g3.addEdge(0, 3);
//     g3.addEdge(3, 4);
//     g3.addEdge(1, 3);
//     test(g3); // Graph is not eulerian

//     cout << "\n--------------------------\n";

//     Graph g4(3);
//     g4.addEdge(0, 1);
//     g4.addEdge(1, 2);
//     g4.addEdge(2, 0);
//     test(g4); // Graph is Eulerian

//     cout << "\n--------------------------\n";

//     Graph g5(3);
//     test(g5); // Graph is Eulerian

//     cout << "\n--------------------------\n";
//     return 0;
// }




// // Partial Graph

// /**
//  * Given 2 graphs, determine if the second one is a partial graph for the first one
//  * 
//  * Example : {
//  * V - vertices
//  * E - edges
//  * 
//  * First Graph
//  * V1 = 5
//  * E1 = 4
//  * 1 2
//  * 3 4
//  * 2 4
//  * 4 5
//  * 
//  * Second Graph
//  * V2 = 5
//  * E2 = 2
//  * 3 4
//  * 2 4
//  * 
//  * Output : YES
//  * 
//  * }
//  * 
//  */


// #include <iostream>
// #include <list>
// #include <algorithm>
// using namespace std;

// int V1,V2,E1,E2;
// list<int> *adj1,*adj2;

// void addEdge(list<int> *&lst , int v, int w) {
//     lst[v-1].push_back(w-1);
//     lst[w-1].push_back(v-1);
// }

// void getInput () {
    
//     int v, w;

//     // First Graph
//     cin >> V1 >> E1;
//     adj1 =  new list<int>[V1];
//     for(int i =0; i < E1; i++){
//         cin >> v >> w;
//         addEdge(adj1,v,w);
//     }

//     // Second Graph
//     cin >> V2 >> E2;
//     adj2 =  new list<int>[V2];
//     for(int i=0;i < E2; i++){
//         cin >> v >> w;
//         addEdge(adj2,v,w);
//     }

// }

// bool found_in_first_graph(int currentNode,int adjNode) {

//         for(auto it : adj1[currentNode]) {
//             if(it == adjNode)
//                 return true;
//         }   
//     return false;
// }   

// bool solve() {

//     // Second graph
//     for(int node2 =0; node2 < V2; node2++) {
//         for(auto adjNode : adj2[node2]){
//             // If in the first graph the current node of the second one and one of its adjacents are not present => false
//             if(!found_in_first_graph(node2,adjNode)){
//                 // cout << "current node : " << node2 << "\n";
//                 // cout << "node not found in G1 : " << adjNode; 
//                 return false;
//             }
                
//         }   
//     }
//     return true;
// }

// int main () {   

//     getInput();
//     cout << solve();
//     return 0;
// }   

// // Trapping rain water

// // https://www.geeksforgeeks.org/trapping-rain-water/

// /**
//  * Given n non-negative integers representing an elevation map 
//  * compute how much water is able tgo tap after raining
//  * 
//  * Example : {
//  * 1) arr = {2,0,2}
//  * Output : 2
//  *  | |
//  *  |_|
//  *
//  *   2)
//  * arr[]   = {3, 0, 0, 2, 0, 4}
// Output: 10
// *         |
// *    |    |
// *    |  | |
// *    |__|_| 
//  * }
//  * 
//  */

// #include <iostream>
// using namespace std;

// int max (int a, int b) {
//     return a > b ? a : b;
// }

// int min (int a, int b) {
//     return a < b ? a : b;
// }

// // First Solution
// int solve1(int arr[], int n) {

//     // Pre-compute highest bar on left and right for every bar
//     int *left = new int[n];
//     int *right = new int[n];

//     // Precompute on left
//     left[0] = arr[0];
//     for(int i = 1; i < n;i++) {
//         left[i] = max(left[i-1],arr[i]);
//     }

//     // Precompute on right
//     right[n-1] = arr[n-1];
//     for(int i  = n-2; i >=0; i--) {
//         right[i] = max(arr[i],right[i+1]);
//     }

//     // for(int i =0; i < n;i++)
//     //     cout << left[i] << " ";

//     // cout << "\n";

//     // for(int i = n-1; i >=0; i--)
//     //     cout << right[i] << " ";

//     int water = 0;
//     for(int i =0; i < n; i++)
//         water += min(left[i],right[i]) - arr[i];
    
//     return water;
// }

// // Second solution
// int solve2(int arr[], int n) {
//     // Two pointers technique
//     // Water trapped : smallest element between a[left] and a[right] 
//     // and move the pointers till "left" if doesn't cross "right"

//     int result = 0;
//     int left_max =0, right_max = 0;

//     // Indices to traverse the array
//     int left = 0, right  = n - 1;

//     while(left <= right ) {

//         // The point is still to get the smallest value between arr[left] and arr[right]
//         if(arr[left] < arr[right]) {
//             // Check the left_max
//             if(arr[left] > left_max){
//                 // Update the max
//                 left_max = arr[left];
//             }else {
//                 result += left_max - arr[left];
//                 left++;
//             }
//         } else {
//             if(arr[right] > right_max) {
//                 right_max = arr[right];
//             }else {
//                 result += right_max - arr[right];
//                 right--;
//             }
//         }

//     }
//     return result;
// }   

// int main () {
//     int arr [] = {0, 1, 0, 2, 1, 0, 1, 3, 2, 1, 2, 1};
//     int n = sizeof(arr)/sizeof(arr[0]);
//     cout << solve1(arr,n) << "\n"; // 6
//     cout << solve2(arr,n) << "\n"; // 6
// }


// // Euler Circuit in a Directed Graph

// // https://www.geeksforgeeks.org/euler-circuit-directed-graph/

// /**
//  * 
//  * Eulerian Path : path in graph the visits every edge exactly once
//  * Eulerian Circuit : Eulerian Path which starts and ends on the same vertex
//  * 
//  * A directed graph has an Eulerian Cycle if :
//  * 1) All veritces with non-zero degree belong to a single strongly connected componenet
//  * ! Quick reminder : Strongly Connected Component = Maximal Strongly Connected Subgraph
//  * ! Still a quick reminder : Strongly Connected Graph = There is a path between all pairs of vertices
//  * 2) In degree and out degree of every vertex is the same
//  * 
//  */

// #include <iostream>
// #include <list>
// using namespace std;

// int V;
// list<int> *adj;
// // In degree counter
// int *in_deg;

// void addEdge(int v, int w){
//     // Out degree = adj[v].size()
//     adj[v].push_back(w);
//     // Increase the number of in degrees for the second vertex
//     in_deg[w]++;
// }

// void DFS(int startNode, bool *visited){

//     visited[startNode] = true;
//     // cout << startNode << "\n";

//     for(auto adjNode : adj[startNode]){
//         if(!visited[adjNode]) {
//             DFS(adjNode,visited);
//         }
//     }

// }

// // Get the reversed graph
// list<int> * getTranspose() {

//     list<int> *rev = new list<int>[V];

//     for(int i = 0; i < V; i++) {
//         if(adj[i].size() == 0 ) continue;
//         for(auto it : adj[i]) {
//             rev[it].push_back(i);
//             // in_deg[i]++;
//         }
//     }
//     return rev;

// }

// // Check if all non-zero degrees are connected
// bool is_connected () {

//     // Run a dfs from starting from the first vertex found with non-zero OUT degrees

//     bool *visited = new bool[V];
//     for(int i = 0; i<V; i++)
//         visited[i] = false;

//     // Get the first vertex with non-zero out degrees
//     int node;
//     for(node = 0; node < V; node++)
//         if(adj[node].size() != 0)
//             break;

//     // If that vertex has not been found
//     if(node == V)
//         return false;

//     // Start DFS from this vertex
//     DFS(node,visited);

//     // If DFS doesn't visit all non-zero out degree vertices
//     for(int i = 0;i<V;i++)
//         if(!visited[i] && adj[i].size() > 0)
//             return false;
    
//     // Reset the visited array
//     for(int i =0; i<V;i++)
//         visited[i] = false;
    
//     // Get the reversed graph
//     list<int> * reversed = new list<int>[V];
//     reversed = getTranspose();  

//     // Start DFS from the vertex that was the starting point for the first DFS
//     DFS(node,visited);

//     // Check if there are some non visited vertices
//     for(int n = 0; n < V; n++) 
//         if(adj[n].size() != 0  && !visited[n])
//             return false;

//     return true;
// }

// bool solve() {

//     if(!is_connected()) 
//         return false;

//     // Check if in degress == out degress
    
//     for(int node = 0; node < V; node++)
//         if(adj[node].size() != in_deg[node]) {
//             cout << node << "\n";
//             cout << adj[node].size() << "\n";
//             cout << in_deg[node] << "\n";
//             return false;
//         }
            

//     return true;
// }

// int main () {

//     V = 5;
//     adj =  new list<int>[V];
//     in_deg = new int[V];
//     // addEdge(1, 0);
//     // addEdge(0, 2);
//     // addEdge(2, 1);
//     // addEdge(0, 3);
//     // addEdge(3, 4);
//     // addEdge(4, 0);


//     // cout << solve() << "\n"; // 1
//     addEdge(1, 0);
//     addEdge(0, 2);
//     addEdge(2, 1);
//     addEdge(0, 3);
//     addEdge(3, 4);
//     addEdge(4, 0);
//     addEdge(0, 4);

//     cout << solve() << "\n"; // 0

//     return 0;
// }   



 
// // https://practice.geeksforgeeks.org/problems/summing-the-sum/0/?ref=self
// #include <iostream>
// using namespace std;

// long long int sum(int n) {
//     return n*(n+1);
// }

// int main () {

//     int N,M,K;
//     cin >> N >> M >> K;

//  long long int prev_sum = N; 
//     // M times
//     for(int i = 1; i<=M;i++) {
//         cout << "prev_sum : " << prev_sum << "\n";
//         prev_sum = sum(prev_sum + K) % (1000000007);
//     }


//     cout << prev_sum;
// }


// /*
// Fiind dat de la tastatura un numar pozitiv intreg nr, pe baza caruia se va construi un vector cu n numere intregi, unde n=nr!
// Restrictii: 2<nr<5
// a) Realizati functii recursive pentru: Factorialul unui numar, citirea vectorului, calcularea produsului elementelor unui vector,verificare numar prim, afisarea unui vector.
// b) Stocati intr-un alt vector B numerele prime aflate pe pozitiile sirului Fibonacci din vectorul dat. ex. sir Fibonacci={0,1,1,2,3,5,8,13, 21, 34, 55, 89, 144, …}
// c) Afisati recursiv intr-un fisier date.out noul vector B.
// d) Calculati si afisati in date.out produsul elementelor impare ale vectorului B.
// e) Realizati si afisati in date.out media aritmetica a tuturor elementelor prime din vectorul A.

// Date de test:
// 3
// 23 13 67 85 91 12
// */

// #include <iostream>
// #include <vector>
// #include <fstream>
// using namespace std;
// ofstream g("date.out");

// int factorial(int n ) {
//     if(n == 1) return 1;
//     return n  * factorial(n-1);
// }

// bool prim(int n, int d) {
//     if(d == 0 ) return false;
//     if(d == 1) return true;
//     if(n % d == 0 ) return false;
//     return prim(n,d-1);
// }

// int produs_impare(vector<int> b, int n) {
//     if(n == 0 ) {
//         return b[0] & 1 ? b[0] : 1;
//     }
//     return b[n] * produs_impare(b,n-1);
// }

// // Genereaza sirul lui fibonacci pana la al "n"-lea termen 
// vector<int> generateFib(int n){

//     // Termenii de baza
//     vector<int>fib = {0,1};
//     for(int i = 2; i <= n; i++)
//         fib.push_back(fib[i-1] + fib[i-2]);

//     return fib;
// }

// void citire(int arr[], int n) {
//     // "Consumam" vectorul
//     if(n != 0 ) citire(arr,n-1);
//     cout << n +1 << ":"; cin >> arr[n];
// }

// // Afisarea in fisier
// void afisare(vector<int> v, int n) {    
//     if(n != 0 ) afisare(v,n-1);
//     g << v[n] << " "; 
// }

// bool found_in_fib(vector<int> fib,int pos ) {
//     for(auto elem : fib) {
//         // Daca pozitia coincide
//         if (elem == pos)
//             return true;
//     }
//     return false;
// }

// vector<int>  stocare(int * arr, int n) {
//     // n - factorial(lungimea lui arr)

//     // Obtinem sirul fibonacci
//     vector<int>fib = generateFib(n);

//     vector<int>b;

//     for(int i =0; i < n;i++) {
//         if(prim(arr[i],arr[i]/2) && found_in_fib(fib,i)) {
//             // cout << arr[i] << " ";
//             // cout << i << " ";
//             // cout << "\n-----\n";
//             b.push_back(arr[i]);
//         }
//     }

//     return b;
// }

// // Suma - suma acumulata a elem prime
// // elemPrime - nr de elemente prime
// float media_aritm (int arr [], int lenArr, int elemPrime, float suma) {
//     if(lenArr == -1 ){
//         return suma/elemPrime;
//     }
//     else return prim(arr[lenArr],arr[lenArr]/2) ? media_aritm(arr,lenArr-1,elemPrime+1,suma+arr[lenArr]) : media_aritm(arr,lenArr-1,elemPrime,suma);
// }

// void solve() {

//     int n;
//     cout << "n = "; cin >> n;
//     int fact_n = factorial(n);
    
//     // Initializez vectorul
//     int *arr = new int[fact_n];
//     citire(arr,fact_n-1);

//     vector<int> B = stocare(arr,fact_n);

//     // Afisam in fisier 
//     afisare(B,B.size() - 1);
//     g << "\n";
//     g << "Produsul numererol impare din B :" << produs_impare(B,B.size()-1);
//     g << "\nMedia aritmetica a numerelor prime : " << media_aritm(arr,fact_n-1,0,0.0);
//     delete [] arr;
// }

// int main () {

//     solve();
//     return 0;
// }


//todo : https://www.geeksforgeeks.org/branch-and-bound-set-1-introduction-with-01-knapsack/
// https://www.geeksforgeeks.org/dijkstras-shortest-path-algorithm-using-set-in-stl/
// https://www.geeksforgeeks.org/boggle-set-2-using-trie/
// https://www.geeksforgeeks.org/print-all-the-cycles-in-an-undirected-graph/
// https://www.geeksforgeeks.org/eulerian-path-undirected-graph/
// https://www.geeksforgeeks.org/fleurys-algorithm-for-printing-eulerian-path/
// http://iampandiyan.blogspot.com/2013/10/c-program-to-find-euler-path-or-euler.html

// https://www.geeksforgeeks.org/given-array-strings-find-strings-can-chained-form-circle/
