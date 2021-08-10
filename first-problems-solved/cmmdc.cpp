// Written at: 7 feb 2017

#include <iostream>

using namespace std;

int main()
{
   int a,b,d,c;
   cin>>a>>b;
   c=a;
   while(a%c+b%c!=0) c=c-1;
   cout<<c;
}
//cmmdc.
