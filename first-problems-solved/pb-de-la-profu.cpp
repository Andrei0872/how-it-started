// Written at: 21 nov 2017

/*
Se citeste de la tastatura un vector a cu n elemente numere intregi
Sa se formeze si sa se afiseze:
- un vector b cu elementele cu valori pare din a sortat crescator
- un vector c cu clementele cu valori impare din a sortat descrescator
- un vector d cu elemetele cu valoaea zero.
Functii recursive: introducere vector, alimentare vector, sortare vector, inversare vector, afisare vector;
*/
#include <iostream>
using namespace std;
int n,a[20],b[20],c[20],d[20], ib=0, ic=0, id=0;
//citire de vector recursiv
void citeste(int i){
if( i!=0) citeste (i-1);
cout<<i<<" : ";
cin>>a[i]; }
void alimentare(int i) {
if(i<n) {
    if(a[i]%2==0 && a[i]!=0 ) { b[ib++]=a[i];}
    else if(a[i]%2==1 && a[i]!=0 ) { c[ic++]=a[i]; }
    else { d[id++]=a[i]; }
 alimentare(i+1); }
 }
void sortare(int a[], int n){
    int final=1;
    for(int i=0;i<n-1;i++){
    if(a[i]>a[i+1]) {
    int aux=a[i]; a[i]=a[i+1]; a[i+1]=aux; final=0; }
    if(!final) sortare(a,n-1); } }



void inversare (int a[], int n, int i){
if (i!=n/2){
int aux=a[i];
a[i]=a[n-i-1];
a[n-i-1]=aux;
inversare(a,n,i+1); }}

void scrie( int v[], int i) {
            if(i!=0) scrie(v,i-1);
            cout<<"\t"<<v[i]; }
int main(){
cout<<"n="; cin>>n;
citeste(n-1);
alimentare(0);
sortare(b,ib,0);
sortare(c,ic,0);
inversare(c,ic,0);
scrie(b,ib-1);
cout<<endl;
scrie(c,ic-1);
cout<<endl;
scrie(d,id-1);
cout<<endl;
return 0;
}
