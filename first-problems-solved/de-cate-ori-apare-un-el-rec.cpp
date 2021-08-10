// Written at: 17 nov 2017

#include <iostream>

using namespace std;
int n,a[20];
/*Functie recursiva pt de cate ori apare o valoare intreaga x intr-un vector a cu n elemente intregi*/
void citeste(int i){
if( i!=0) citeste (i-1);
cout<<i<<" : ";
cin>>a[i]; }

int nrap(int a[], int n, int x){
if(n==-1) return 0;
else if(a[n]==x) return 1+nrap(a,n-1,x);//daca vect incepe de la 1
else return nrap(a,n-1,x);  }
int maxim(int a[], int n)
{
    if(n==-1) return -32000;
    else return max(a[n],maxim(a,n-1));
}
int cmmmdc(int c, int b)
{
    if(b==0) return c;
    else return cmmmdc(b,c%b);
}
int cmmmdc1(int a[],int n)
{
    if(n==2) return cmmmdc(a[0],a[1]);
        else return cmmmdc(cmmmdc1(a,n-1),a[n-1]);

}

int suma(int a[], int n)
{
    if(n==-1) return 0; //situatia in care nu mai sunt elemente in sir, pozitia n=-1  nefiind in sir
	else return a[n]+suma(a,n-1);
}
int main()
{ int x;
    cin>>n;
    citeste(n-1);
    cin>>x;
    cout<<nrap(a,n,x)<<endl;
    cout<<"maximul este : "<<maxim(a,n);
    cout<<endl;
    cout<<"cmmmdc al sirului este : "<<cmmmdc1(a,n);
    cout<<endl;
    cout<<"suma el  este : "<<suma(a,n);
}
