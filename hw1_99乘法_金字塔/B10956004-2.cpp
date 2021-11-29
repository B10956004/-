#include <iostream>
using namespace std;
/* run this program using the console pauser or add your own getch, system("pause") or input loop */

int main(int argc, char** argv) {
	int i=0;
	int j=0;
	int layer=0;//層
	//金字塔
	cout<<"輸入層次:";
	cin >> layer;
	for(i=0;i<=layer;i++){
		for(j=0;j<layer-i;j++)
		{
			cout<<" ";
		}
		for(j=0;j<2*i-1;j++)
		{
			cout << "*"; 
		}
		cout<<endl;
	}
	return 0;
}
