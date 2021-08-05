# LSP - Liskov Substitution Principle (Princípio substituição de Liskov)

> “Se q(x) é uma propriedade demonstrável dos objetos x de tipo T.
> Então q(y) deve ser verdadeiro para objetos y de tipo S
> onde S é um subtipo de T.” (Barbara Liskov, 1987)

Translate:

Se S é um subtipo de T, então os objetos do tipo T, em um programa,
podem ser substituídos pelos objetos de tipo S sem que seja necessário
alterar as propriedades deste programa.

![LSP](https://hsto.org/r/w1560/webt/ox/dv/w4/oxdvw4pnkf7opg-88jxjwstk40u.png)

Nosso contexto:

Se **Admin** é um subtipo de **User**, então os objetos do tipo **User**,
no **Mail.php**, podem ser substituídos pelos objetos de tipo **Admin**
sem que seja necessário alterar as propriedades deste programa.

> “Classes derivadas devem poder ser substituídas por suas classes base” (Robert C. Martin, 1996)
_ _ _ 
![LSP](https://1.bp.blogspot.com/-Krp8u7RTb8I/WFqA6Y7kfNI/AAAAAAAACyE/tm3jMnQE_1gnWt9Rwwf95iKGBXcE4QEkACLcB/s1600/LSP_WithText-mallard-duck.jpg)
> Se parece como um pato, grasna como um pato, porém precisa de baterias,
> provavelmente você possui um problema de abstração.

