// Written in: 11 dec 2017

#include <iostream>

using namespace std;

int prim(int n, int d)
{
    if(d==1) return 1;
    else if(n%d==0) return 0;
    else return prim(n,d-1);
}


int main()
{
 int n,i, p=1,k=0;
 cin>>n;
 for(i=2;i<=n;i++)
 {
     if(n%i==0 && prim(i,i/2)==1) {
        p=p*i;
        k++;
     }
 }
 cout<<k<<" "<<p<<endl; // cati divizori primi sunt si produsul lor
 if(p==n && k==2) cout<<"da";
 else cout<<"nu";
 return 0;
}
