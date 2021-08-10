// Written at: 21 mar 2018

#include <iostream>

using namespace std;
/*
functia pt factorial se aseamana cu afisarea nr de la 1 pana la N, doar ca in loc sa se afiseze, le inmultim
*/
int factorial(int st, int dr, int n) {
    if(st==dr) return st;
    else return factorial(st,(st+dr)/2,n) * factorial((st+dr)/2+1,dr,n);
}

int factRec(int n) {
    if(n==1) return 1;
    else return n*factRec(n-1);
}

int main() {

int n;
cin >> n;
cout << factorial(1,n,n) << "\n";
cout << factRec(n);
return 0;
}



///descompunere in factori primi
/*


//   int n;
//   cin >> n;
//   int d=2,p;
//   for(d=2; n>1;d++) {
//    for(m=0;n%d==0;n/=d,m++);
//    if(m) cout << d <<" la " <<m<<endl;
//   }
//while(n>1) {
//    p=0;
//    while(n%d==0) {
//        p++;
//        n/=d;
//    }
//  if(p) cout << d << " la " <<p<<endl;
//    d++;
//}



*/
