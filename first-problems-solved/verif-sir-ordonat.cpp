// Written at: 25 nov 2017

#include <iostream>
using namespace std;
int n,a[20];
//citire de vector recursiv

void citeste(int i){
if( i!=0) citeste (i-1);
cout<<i<<" : ";
cin>>a[i]; }

void  sortare( int n, int &k)
{if(n>0){if(a[n-1]>a[n]){k++;}
            sortare(n-1,k);}
}

    int main()
{
int k=0;
cout<<"n="; cin>>n;
citeste(n-1);
for(int i=0;i<n;i++){cout<<a[i]<<" ";}
cout<<endl;
sortare(n-1,k);
if(k==0) cout<<"da";
else cout<<"nu";

    }
///mergeeeeeeeeeeee
