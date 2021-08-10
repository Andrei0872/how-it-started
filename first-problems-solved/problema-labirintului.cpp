// Written at: 24 mar 2018

/*
pb 5/54, Metode de programare, Grafori si POO

se va folosi algoritmul lui Lee

se stie poz initiala si cea finala, se cere afisarea drumului cel mai scurt si lungimea acestuia

*/

#include <fstream>
#include <queue>
#include <iostream>
#define NMAX 100
using namespace std;
ifstream f("labirint.in");
ofstream g("labirint.out");
queue< pair<int, int> > coada;
const int dx[4] = {-1,1,0,0}; // vecinii
const int dy[4] = {0,0,-1,1}; // vecinii
int startX,startY, //coordonatele pozitiei de start
    stopX,stopY, //coordonatele pozitiei de final
    b[NMAX][NMAX], //matricea "Lee"
    a[NMAX][NMAX],//matricea care va contine drumul si obstacolele
    nrColoane,nrLinii;

void citire() {
  char x;
 f >> startX >> startY >> stopX >> stopY;
 while(f.peek()!=EOF) { // ia urmatorul caracter dupa citirea coord pozitiilor finale si initiale
    nrLinii++; //ne aflam intial pe linia 1, apoi va tot creste
    nrColoane = 0; //reseteam nr de coloane pe masura ce citim o linie noua
    do {
        nrColoane++; //initializam nr de coloane pt fiecare linie
        f >> x;
        if(x=='0') a[nrLinii][nrColoane] = 0;
        else a[nrLinii][nrColoane] =-1;
    }while(f.get()!='\n'); //cat timp caracterul ce urmeaza nu e terminator de sir
 }
}
//verificam daca vecinii sunt ok
bool OK(int x, int y) {
    if(x<1 || y<1 || y>nrColoane || x>nrLinii) return false;
    if(a[x][y]==-1) return false;
    return true;
}

void lee() {
b[startX][startY]=1;//se init poz de inceput cu 1
coada.push(make_pair(startX,startY)); //se adauga in coada;
int x,y,cx,cy;
while(!coada.empty()) {
    x = coada.front().first;//i
    y = coada.front().second;//j
    coada.pop();//se sterg din coada coordonatele dupa ce au fost luate in considerare
    for(int d=0;d<4;d++) {//se iau vecinii
        cx = x +dx[d];
        cy = y +dy[d];
        if(OK(cx,cy) && b[cx][cy]==0) { //daca sunt OK vecinii, si spatiul vecin nu a fost completat
            b[cx][cy] = b[x][y]+1; //se mareste practitc distanta
            coada.push(make_pair(cx,cy));
        }
    }
}
}

void afisareDrum() {
int drum[3][NMAX];
int x,y,cx,cy,nr,indice=1;
drum[1][1] = stopX; //i
drum[2][1] = stopY;//j
nr = b[stopX][stopY];
x = stopX;
y = stopY;
while(b[x][y]>1){ //ca deja s a memorat poz initiala {
    nr--;//scade distanta
    //luam vecinii acum
    for(int d=0;d<4;d++) {
        cx = x+dx[d];
        cy = y +dy[d];
        if(b[cx][cy]==nr && OK(cx,cy)) {
            indice++;
            drum[1][indice] =cx;
            drum[2][indice] = cy;
            x =cx;
            y = cy;
            break; //s a gasit vecin, se termina
        }
    }
}
for(int i=indice;i>=1;i--)
    g << drum[1][i] << " " <<drum[2][i]<<'\n';
}
//afisare recursiva
int ap[100];
void afisareRec(int x, int y) {
    if(b[x][y]==1) {
        cout << x << " " << y <<endl;
        return;
    }
    else {
        for(int d=0;d<4;d++) {
            if(OK(x+dx[d],y+dy[d]) && b[x+dx[d]][y+dy[d]]==b[x][y]-1 && ap[b[x][y]]==0){
                    ap[b[x][y]]=1;
                afisareRec(x+dx[d],y+dy[d]);
               cout << x << " " << y <<endl;
            }
        }
    }
}

int main()
{
citire();
lee();
 for(int i=1;i<=nrLinii;i++) {
        for(int j =1;j<=nrColoane;j++)
           cout << b[i][j] << " ";
            cout<< '\n';
    }
cout<<endl;
cout<<endl;
cout<<endl;
if(b[stopX][stopY]) {
g << b[stopX][stopY]<<"\n";
afisareDrum();
afisareRec(stopX,stopY);
}
else g <<"nu se poate ajunge";
}
