#include <iostream>

using namespace std;

int a, b, x;

int main()
{
    cin >> a >> b >> x;
    if(x >= a and x <= b)
        cout << "DA";
    else
        cout << "NU";
    return 0;
}
