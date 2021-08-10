// Written at: 8 ian 2018

/*
1.Se da un sir de numere intregi.
Sa se ordoneze sirul astfel incat primele
pozitii sa contina elementele impare
ordonate crescator si in continuare elementele pare ordonate descrescator.

*/
#include <iostream>
using namespace std;
void citire(int a[], int n)
{
    for(int i=0;i<n;i++)
        cin>>a[i];
}
void ordonareCresc(int a[],int n)
{
 int final=1;
 for(int i=0;i<n-1;i++)
 {
     if(a[i]>a[i+1])
     {
         int aux=a[i];
         a[i]=a[i+1];
         a[i+1]=aux;
         final=0;
     }
     if(!final) ordonareCresc(a,n-1);
 }
}
void ordonareDescr(int a[], int n)
{
     int final=1;
 for(int i=0;i<n-1;i++)
 {
     if(a[i]<a[i+1])
     {
     int aux=a[i];
         a[i]=a[i+1];
         a[i+1]=aux;
         final=0;
     }
     if(!final) ordonareDescr(a,n-1);
 }
}
void afisare(int a[],int b[], int n,int m)
{
    for(int i=0;i<n;i++)
        cout<<a[i]<<" ";
        for(int j=0;j<m;j++)
            cout<<b[j]<<" ";
}
int main()
{
    int n,i,k=0,l=0,b[10],c[10];
    cin>>n;
    int *a=new int[n];
    citire(a,n);
    //crearea vectorilor ce vor contine elementele pare si impare
    for(i=0;i<n;i++)
    {
        if(a[i]%2==0) b[k++]=a[i]; //pare
        else if(a[i]%2==1) c[l++]=a[i]; //impare
    }
ordonareCresc(c,l);
ordonareDescr(b,k);
afisare(c,b,l,k);
delete []a;
return 0;
}///bv,merge
