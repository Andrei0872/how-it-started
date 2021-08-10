// Written at: 2 ian 2018

/*#include <iostream>
#include <cstring>
using namespace std;

int main()
{
    char s1[255], s2[255], *p;
    cout<<"citirea primului sir : \n";
    cin.get(s1,255); cin.get();
    cout<<"citirea secundului sir : \n";
    cin.get(s2,255); cin.get();
    if(strlen(s1)==strlen(s2))
     {
        while(strcmp(s1,"")!=0) // cat timp sirul s1 este diferit de sirul vid
            {p=strchr(s2,s1[0]);
        if(p) strcpy(p,p+1); //daca p este gasit, acesta se sterge din s2;
        strcpy(s1,s1+1); //se sterge din s1 primul caracter.

    }
    if(s2[0]==0) cout<<"sunt anagrame";
        else cout<<"nu s anagrame";
}
else  cout<<"nu s anagrame ";
return 0;
}
*/ //bravo, e buna

///varianta 2

#include <iostream>
#include <cstring>
using std::cin;
using std::cout;
int main()
{
    char s1[255], s2[255], *p;
      cout<<"citirea primului sir : \n";
    cin.get(s1,255); cin.get();
    cout<<"citirea secundului sir : \n";
    cin.get(s2,255); cin.get();
      if(strlen(s1)!=strlen(s2)) cout<<"nu s anagrame ";
      else {
        int k=1;
        for(int i=0;i<strlen(s2);i++)
        {
            p=strchr(s1,s2[i]);
            if(p==NULL) k=0;
               // else strcpy(p,p+1);

        }
        if(!k) cout<<"nu s anagrame";
        else cout<<"sunt anagrame";
      }
      return 0;
}
