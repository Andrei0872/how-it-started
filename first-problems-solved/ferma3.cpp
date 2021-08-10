// Written at: 12 mar 2018

#include <fstream>
using namespace std;
const int NMAX = 405;
const int dx[4] {-1,1,0,0};
const int dy[4] ={0,0,-1,1};
int n,m,v,a[NMAX][NMAX], matFill[NMAX][NMAX],nr_zona,lung[NMAX*NMAX],maxim1,arieMaxima, arie,iMax,jMax;
char x, ch;
bool aparitie[NMAX*NMAX];
ifstream f("ferma3.in");
ofstream g("ferma3.out");

void citire() {
    f >> v >> n >> m;
    int i,j;
    for(i=0;i<n;i++) {
        for(j=0;j<m;j++) {
            char c;
            f >> c;
            a[i][j] = (int) c;
        }
    }
}

bool verif(int i, int j) {
    return (i>=0 && j>=0 && i<n && j<m);
}

bool OK(int i, int j) {
    if(i<0 || j<0 || i>=n || j>=m) return false;
    if(matFill[i][j]) return false; ///daca spatiul nou e deja ocupat
    return true;
}

algFill(int x, int y) {
    matFill[x][y] = nr_zona;///nr specific unei arii ocupate
    lung[nr_zona]++;///lungimea zonei pe care o ocupa

    for(int d=0;d<4;d++) {
        if(OK(x+dx[d],y+dy[d]) && a[x][y]==a[x+dx[d]][y+dy[d]])
            algFill(x+dx[d],y+dy[d]);
    }

}

void rez(){
    int i,j;
    for(i=0;i<n;i++) {
        for(j=0;j<m;j++) {
            nr_zona++;
            if(!matFill[i][j]) ///daca e spatiu liber
                algFill(i,j);
        if(lung[nr_zona] > maxim1)
            maxim1 = lung[nr_zona];
        }
    }
}

void task2() {
int k,l,j,i,d;
    for(i=0;i<n;i++) {
        for(j=0;j<m;j++) {
            for(d=0;d<4;d++) {
                if(a[i+dx[d]][j+dy[d]]!= a[i][j] && verif(i+dx[d],j+dy[d])) ///daca vecinu e dif de actual
                    x = a[i+dx[d]][j+dy[d]];///cautam vecini egali cu x
                    arie = 0;
                    for(l=0;l<4;l++) {
                        if(a[i+dx[l]][j+dy[l]] == (int)x && verif(i+dx[l],j+dy[l])) {
                            int indiceZona = matFill[i+dx[l]][j+dy[l]]; ///se ia nr zonei
                            if(aparitie[indiceZona] == 0){
                                aparitie[indiceZona] =1;
                                arie += lung[indiceZona];
                            }
                        }
                    }
                    ///restartam aparitiile vecinii
                    for(k=0;k<4;k++) {
                        aparitie[matFill[i+dx[k]][j+dy[k]]]=0;
                    }
                      if(arieMaxima < arie) {
                        arieMaxima = arie;
                        ch =x;
                        iMax = i;
                        jMax  =j;
                      }
            }///se inchide la final pt a lua pe fiecare x in parte
        }
    }
    g << iMax+1 << " " <<jMax+1<<"\n";
    g << ch;/*<< " "<<arieMaxima+1<<"\n";*/
}
int main()
{
citire();
rez();
if(v==1) {g << maxim1<< "\n";}
else task2();
f.close();
g.close();
return 0;
}
