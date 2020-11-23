#include <bits/stdc++.h>
using namespace std;
typedef long long int lint;

/*
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You may or may not have received a copy of the GNU General Public License
    along with this program.  If not, see <https://www.gnu.org/licenses/>.

    Author: Yogiraj <admin@yogirajhendre.ml>
*/
int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    srand ( time(NULL) );
    lint t;
    t = 1;
    while(t--)
    {
    	vector<double> m1;
    	for (int i = 0; i < 10; ++i)
    	{
    		m1.push_back(rand()%100);
    	}
    	for (auto &p:m1)
    		cout << p << "	";
    	cout << endl;
    	double sum = 0;
    	for_each(m1.begin(), m1.end(), [&](double x){sum+=x;});

    	cout << sum << endl;
    }

    return 0;
}