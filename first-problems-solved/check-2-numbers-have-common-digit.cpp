// Written at: 15 dec 2017

#include<iostream>
using namespace std;
int n, m, aux; bool ok;
int main()
{ cin >> m >> n;
while(m)
    { aux = n;
    while(aux) {
            if(aux % 10 == m % 10) ok=true;
    aux = aux / 10; }
m = m / 10; }
if(ok) cout<<"DA";
else cout<<"NU";
return 0; }
 //! MERGEEE
