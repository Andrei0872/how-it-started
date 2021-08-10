// Written at: 12 nov 2017

/* Fiind dati doi vectori u si v cu cate n elemente fiecare, se cere:
a) un program care determina suma celor doi vectori. Vectorul suma se defineste: w[i]=u[i]+v[i], pentru
i=1,2,...,n
b) un program care calculeaza produsul scalar al celor doi vectori: P=u[1]*v[1]+u[2]*v[2]+...+u[n]*v[n] */


#include <iostream>

using namespace std;
int v[20],u[20],w[20],p[20],n;
void citire(int a[],int i)
{
    if(i!=0) citire(a,i-1);
    cout<<i<<" : ";
        cin>>a[i];
}
void alimentare(int i)
{
    if(i<n){
        w[i]=v[i]+u[i];
        p[i]=v[i]*u[i];
        alimentare(i+1);
    }
    }
    void afisare(int a[],int i)
    {
        if(i!=0) afisare(a,i-1);
        cout<<a[i]<<" ";

    }
int main()
{

   cin>>n;
   citire(v,n-1);
   citire(u,n-1);
   alimentare(0);
   afisare(w,n-1);
   cout<<'\a'<<'\n';
   afisare(p,n-1);
}
