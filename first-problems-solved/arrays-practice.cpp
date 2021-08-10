// Written at: 19 Nov 2017

/*
Se citeste de la tastatura un vector a cu n elemente numere intregi
Sa se formeze si sa se afiseze:
- un vector b cu elementele cu valori pare din a sortat crescator
- un vector c cu elementele cu valori impare din a sortat descrescator
- un vector d cu elementele cu valoarea zero

Functii recursive: introducere vector, alimentare vector, sortare vector, inversare vector, afisare vector
*/

#include<iostream>
using namespace std;
int n, a[100], b[100],c[100],d[100],ib=0, ic=0, id=0;

//functie recursiva de citire
void citire(int i){//in int main se apeleaza citire(n-1);
if(i!=0) {citire (i-1);}
cout<<i+1<<" : ";
cin>>a[i];
}

//alimentare recursiva vectori cu elemente dintr-un vector parinte
void alimentare(int i){
if(i<n){
    if(a[i]%2==0 && a[i]!=0){
    b[ib++]=a[i];}
//indexul vectorului de alimentat se incrementeaza ca si contor//
    else if(a[i]%2==1 && a[i]!=0){
    c[ic++]=a[i];}
    else{
    d[id++]=a[i];}
    alimentare(i+1);
    }
}//terminat functie

//sortare quick sort-inserare rapida
int Divide(int p,int q, int v[50]){
/*plaseaza elementul a[p] pe pozitia sa corecta in vectorul ordonat, in stanga sa fiind plasate numai elementele mai mici, in dreapta numai elementele mai mare decat el si intoarce pozitia pe care a fost plasat a[p]*/
int st=p, dr=q, x=v[p];
while(st<dr){
    while(st<dr && v[dr]>=x) dr--;
    v[st]=v[dr];
    while(st<dr && v[st]<=x) st++;
    v[dr]=v[st];}
v[st]=x;
return st;
}
//sortarea propriu zisa
void QSort(int p, int q, int v[50]){
    //sorteaza elementele a[p],...,a[q]
    int m=Divide(p,q,v);
    if(m-1>p) QSort(p,m-1,v);
    if(m+1<q) QSort(m+1,q,v);
}
//functie recursiva de inversat vectorul in ele insusi
void inversare (int v[],int n, int i){
    if(i!=n/2){
        int aux=v[i];
        v[i]=v[n-i-1];
        v[n-i-1]=aux;
        inversare(v,n,i+1);}
}

void afisare(int v[],int i){
    if(i!=0) afisare (v,i-1);
    cout<<"\t"<<v[i];
    }



int main(){
cout<<"Introduceti lungimea vectorului A:\n";
cin>>n;
citire(n-1);
alimentare(0);
QSort(0, ib-1,b);
QSort(0, ic-1,c);
inversare(c, ic, 0);
afisare(b,ib-1);cout<<endl;
afisare(c,ic-1);cout<<endl;
afisare(d,id-1);
cout<<endl;
return 0;
}
