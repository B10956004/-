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
	cout<<"�п�J�X�Ӹ`�I:"<<endl;
	cin>>len;
	for(i=0;i<len;i++){
		current=(struct Node *) malloc(sizeof(struct Node));
		cout<<"�п�J��"<<i+1<<"�Ӹ`�I��:";
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
		cout<<"�ثe�`�I��}:"<<first<<"�`�I�Ʀr:"<<first->data<<"�U�Ӹ`�I��}:"<<first->next<<endl;
		first=first->next;
	}
	
	system("pause");
	return 0;
}
