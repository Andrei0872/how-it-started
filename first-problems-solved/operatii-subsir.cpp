// Written at: 9 ian 2018

/*
///cautarea unui subsir intr un sir, sa se afiseze nr de aparitii ale unui subsir intr un sir si pozitiile lui
#include <iostream>
#include <cstring>
using namespace std;

int main()
{   int nr=0,ok=0;
    char s[40], sb[20],*p,*q,*r;
    cin.getline(s,40);
    cin.getline(sb,20);
for(p=s;*p;p++)
{
    for(r=p,q=sb; *r==*q && *q; r++,q++);
    if(*q==0) //terminator de sir
    {nr++; ok=1; cout<<" pozitia : "<<p+strlen(sb)-s<<endl;}
}
if(ok) cout<<" apare de "<<nr<<" ori";
return 0;
}
///bvv */
/*
///stergerea unui subsir dintr un sir, stiind pozitia si lungime.
#include <iostream>
#include <cstring>
using namespace std;

int main()
{   int i,poz,lung;
    char s[30];
    cin.getline(s,30);
    cin>>poz>>lung;
    if(poz > strlen(s)) cout<<"pozitie induisponibila";
    else {

        if(lung > strlen(s)-poz) // se sterg ultimele strlen(s)-poz elemente
          for(i=poz-1;s[i+strlen(s)-poz+1];i++) s[i]=s[i+strlen(s)-poz+1];
        else {for(i=poz-1;s[i+lung];i++)
            s[i]=s[i+lung]; }
            s[i]=0;

    cout<<s;
    }
}
*/
///extragerea unui subsir dintr un sir, cunoscandu se pozitia si lungimea
#include<iostream>
#include<cstring>
using namespace std;
int main()
{   int i,poz,lung;
    char s[30],sb[30]="";
    cin.getline(s,30);
    cin>>poz>>lung;
    if(poz < strlen(s))
    {
        if(lung>strlen(s)-poz) strcpy(sb,s+poz-1);
        else strncat(sb,s+poz-1,lung);
    cout<<sb;
    }
    else cout<<"pozitie indisponibila";
}
///bvvvv
