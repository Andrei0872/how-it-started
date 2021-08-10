// Written at: 16 sep 2018

/*
Example : 

1)
balls.in :
1
36
5
balls.out: // Print number of tubes that containt red balls and how many balls the second array(y) has
6 29
Explanation : the first array will contain 7 balls (1, 3, 7, 12, 18, 26, 35)

2)
balls.in : 
2
36
5
3
balls.out :
126
At the third level we can find the following balls : 7, 5, 11,
17, 23, 29 and 34.
Their sum is 126
*/

#include <fstream>
#include <vector>
#include <algorithm>
#include <cmath>
using namespace std;
ifstream f("tbile.in");
ofstream g("tbile.out");

void DRY (vector<int> &x, vector<int> &y, int n) {

    // Primii 2 pasi
    x.push_back(1);
    x.push_back(3);
    y.push_back(2);
    y.push_back(4);

    // Pasul 3 si cele ce urmeaza
    int i = 2;
    int prev, bila,index;
    while(x.back() <= n) {
        prev = x.at(i-1);
        x.push_back(x.at(i-1) + y.at(i-1));
        index = 1;
        if(x.back() > n) continue;
        while(y.back() < x.back() - 1) {
            bila = prev + index;

            if(find(y.begin(), y.end(),bila) == y.end()) {
                y.push_back(bila);
            }

            index++;
        }
        i++;
    } 
    x.pop_back();
    int last = x.back();
    // Adaugam in sirul y ceea ce a ramas de adaugat
    for(int cnt = 1; y.back() <= n-1; cnt++ ) {
        y.push_back(last + cnt);
    }

}

void solve_1(int n, int m) {

    vector<int> x;
    vector<int> y;
    
    DRY(x,y,n);

    // Determin nr de tuburi de culoare rosie
    int bile_rosii = n - x.size();
    int nr_tuburi = ceil((float)bile_rosii / m );
    g << nr_tuburi << " ";
    // Determin cate bile contine sirul y
    g << bile_rosii;
    
    return;
}

/** 
 * Creez o matrice folosindu-ma de :
 * 1) Numarul de bile care intra intr-un tub : nr de linii
 * 2) Numarul tuburi : nr de coloane
*/
void solve_2(int n, int m) {
    
    int v; // Nivelul
    f >> v;

    vector<int> x;
    vector<int> y;
    
    DRY(x,y,n);

    // Determin numarul total de tuburi
    int bile_rosii = n - x.size();
    int total_tuburi = ceil((float) bile_rosii / m) + ceil((float) x.size() / m) ; 

    // Creez matricea
    int mat [m][total_tuburi] = {{0}}; 
     
    // Alimentez matricea
    int col = 0;
    int row = m-1;
    for(int i =0; i < x.size(); i++) {
        if(row == -1 ) {
            col++;
            row = m - 1;
        } 
        mat[row--][col] = x.at(i);
    }

    // Trec la coloana urmatoare si reincep linia
    col++;
    row = m-1;
    for(int i =0; i < y.size(); i++) {
        if(row == -1) {
            col ++;
            row = m-1;
        }
        mat[row--][col] = y.at(i);
    }
    
    // Suma de pe nivelul V
    int suma = 0;
    for(int i = 0; i < total_tuburi; i++) {
        suma += mat[v-1][i];
    }
    g << suma;
}

void citire() {

    int c, n , m;
    f >> c;
    f >> n >> m;
    if(c == 1)
        solve_1(n,m);
    else
        solve_2(n,m);

    f.close();
}


int main () {

    citire();
    return 0;

}