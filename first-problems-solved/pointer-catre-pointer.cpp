// Written at: 2 feb 2018

#include <iostream>

using namespace std;

int main()
{
    int  a=10, *p=&a, ///lui p i se atribuie adresa variabilei "a"
    **pp=&p; ///lui pp i se atribuia adresa variabilei "p"
*p+=1; ///se va afisa 11
    cout<<a<<" "<<*p<<" "<<**pp;
}
