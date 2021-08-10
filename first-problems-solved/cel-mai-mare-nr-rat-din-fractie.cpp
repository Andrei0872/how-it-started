// Written at: 7 dec 2017

// se citesc n fractii. simplificati fr reduct. si afisati cel mai mare nr rational
#include <iostream>
///pb7
using namespace std;

struct fractie {
int n,N;

}a[30],aux;

void citire(fractie a[],int &x)
{
    for(int i=0;i<x;i++)
    {
        cout<<"introduceti numaratorul :"<<endl;
        cin>>a[i].n;
          cout<<"introduceti numitorul :"<<endl;
        cin>>a[i].N;

    }
}


int cmmmdc(int n1,int n2)
{
    if(n2==0) return n1;
    else return cmmmdc(n2,n1%n2);
}

 int lcm(int c,int b){

   static int temp = 1;

    if(temp % b == 0 && temp % c == 0)
         return temp;
    temp++;
    lcm(c,b);

   return temp;
}

int lmcsir(fractie a[],int n){
if(n==2) return lcm(a[0].N,a[1].N);
else return lcm(lmcsir(a,n-1),a[n-1].N);
}

int maxim(fractie a[],int x)
{
    if(x==-1) return -32000;
    else return max(a[x].n,maxim(a,x-1));
}


int main()
{
    int x,i,d,k,l;
    cout<<"dati nr de fractii :"<<endl; cin>>x;
    citire(a,x);
    for( i=0;i<x;i++)
    { k=lmcsir(a,x);
        if(a[i].N!=k) a[i].n=a[i].n*(k/a[i].N);
    } ///aducerea la num comun
k=lmcsir(a,x);
l=maxim(a,x-1);
d=cmmmdc(l,k);
if(d==1) cout<<l<<"/"<<k;
else cout<<l/d<<"/"<<k/d;

    }
