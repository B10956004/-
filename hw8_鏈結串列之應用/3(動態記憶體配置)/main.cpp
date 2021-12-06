#include <iostream>
#include <cstdlib>//use malloc 
using namespace std;
/* run this program using the console pauser or add your own getch, system("pause") or input loop */
struct Node
{
	int data;
	struct Node *next;
};
struct Node *first,*current,*previous;
int main(int argc, char** argv) {
	int len=0,i,ndnum;
	cout<<"請輸入幾個節點:"<<endl;
	cin>>len;
	for(i=0;i<len;i++){
		current=(struct Node *) malloc(sizeof(struct Node));
		cout<<"請輸入第"<<i+1<<"個節點值:";
		cin>>ndnum; 
		current->data=ndnum;
		if(i==0){
			first=current;
		}
		else{
			previous->next=current;
		}
		current->next=NULL;
		previous=current;
	} 
	//print 
	while(first!=NULL){
		cout<<"目前節點位址:"<<first<<"節點數字:"<<first->data<<"下個節點位址:"<<first->next<<endl;
		first=first->next;
	}
	
	system("pause");
	return 0;
}
