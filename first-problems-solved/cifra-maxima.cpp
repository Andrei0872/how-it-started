// Written at: 11 feb 2017

#include <iostream>

using namespace std;

int main()
{
    int n,c,n1;
cout<<"n=";cin>>n;
c=0;n1=n;
do
{
if(c<n1%10)
c=n1%10;
n1=n1/10;
}while(n1);
cout<<"cifra maxima "<<n<<" este: "<<c;
}
