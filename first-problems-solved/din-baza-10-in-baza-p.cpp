// Written at: 8 nov 2017

#include <iostream>

using namespace std;

int main()
{
    int n,p,m,r;
    cin>>n;
    int b;
    cin>>b;
   m=0  ;           // va conţine rezultatul conversiei

p=1    ;         // puterile lui 10 iniţial

 while(n)
 {


  r=n%b      ;  // calculez restul împărţirii numărului la bază

  m=m+r*p     ; // formez valoarea noului număr

  p=p*10 ;      // cresc puterea lui 10

 n=n/b   ;     // calculez câtul împărţirii numărului la bază

 }

cout<< m  ;
}
