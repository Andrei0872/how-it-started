// Written at: 2 feb 2018

#include <iostream>

using namespace std;

int main()
{
     int a=10,b=20, *p=&a, *q=&b;
     *q=*p; /// variabilei de la adresa q, cea care tine val 20, i se atribuia valoarea de la adresa lui a, adica 10

     cout<<a<<" "<<b<<endl;
///----------------------
     int c = 10, *r=&c;
     *r+=5;
     cout<<"c= "<<c<<endl;
     ++*r; cout<<" preIncrementare : "<<c<<endl;
     (*r)++; cout<<" postIncrementare : "<<c<<endl;
}
