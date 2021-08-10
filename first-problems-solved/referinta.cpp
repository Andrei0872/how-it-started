// Written at: 3 feb 2018

#include <iostream>

using namespace std;

int main()
{
   int a=10,&b=a; /// lui "a" i s-a mai dat un nume

   cout<<a<<" "<<&a<<" "<<endl;
   cout<<b<<" "<<&b<<endl;

   b=15;
   cout<<a<<" "<<&a<<" "<<endl;
   cout<<b<<" "<<&b<<endl;
   ///se schimba si a-ul pt ca ambele, a si b, se refera
   ///la continutul ACELEIASI ZONE DE MEMORIE
}
