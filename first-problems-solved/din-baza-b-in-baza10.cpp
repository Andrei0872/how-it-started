// Written at: 30 oct 2017

#include <iostream>

using namespace std;

int main()
{
    int n,b,p,m,c;
 cin>> n>>b;
      // n – numărul de transformat, b baza în care este scris n

p=1;             // b0=1

m=0;            // va contine numarul în baza 10

while(n)

   {c=n%10;      // extrag cate o cifra din numarul dat

   m=m+c*p ;    // formez numarul adunând cifrele extrase din n cu puteri ale

               // bazei

   p=p*b;       // cresc puterea bazei

   n=n/10;      // elimin ultima cifra din n

   }
cout<< m;         // valoarea numărului în baza 10
}
