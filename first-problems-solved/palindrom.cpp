// Written at: 12 nov 2016

#include <iostream>
using namespace std;
int main()
 {
 int x,x1,t;
 cout<<"x= ";cin>>x;
 t=x;
 x1=0;
 while(t!=0)
 {
 x1=x1*10+t%10;
 t=t/10;
 }
 if(x==x1)
 cout<<"Numarul este palindrom !";
 else
 cout<<"Numarul nu este palindrom !";
return 0;
 }
