# SRP - Single Responsibility Principle (Princípio da Responsabilidade Única)

> Uma classe deve ter um, e somente um, motivo para mudar. (Uncle Bob)

Em outras palavras, ele está falando sobre coesão.

Você pode entender coesão como sendo o quão forte é a relação entre os elementos de uma classe,
se essa relação é forte, os elementos têm uma alta afinidade entre si.
Quanto mais bem definida uma classe é, maior a sua coesão.
Quando mais coesa, menos motivos terá para mudar.

Obs: O conceito de coesão é bem diferente de acoplamento.
Acoplamento é quando você tem uma forte dependência entre os elementos,
assim alterar um desses vai acarretar mudanças nos outros também.

Ou seja, essa classe deve ser especializada em um único assunto e possuir apenas uma responsabilidade,
tendo uma única tarefa ou ação para executar.

### Bad Smells
* Muitas tarefas/ações.
* Dificuldades de “mockar”;
* Dificuldades para reaproveitar o código;
* Dificuldade de realizar alterações sem comprometer as outras responsabilidades.
* **God Class**: classes que fazem de tudo.
* Funções/metodos/struct/... que fazem de tudo.
------
![](https://miro.medium.com/max/638/1*8G6pxtpH5taKjIk3mQzbkg.jpeg)
