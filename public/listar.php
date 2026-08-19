<?php
               </option>

           <?php endwhile; ?>

       </select>

       <button>Filtrar</button>

   </form>


   <table>

       <tr>
           <th>Prato</th>
           <th>Descrição</th>
           <th>Preço</th>
           <th>Categoria</th>
           <th>Responsável</th>
           <th>Ações</th>
       </tr>

       <?php while ($prato = $pratos->fetch_assoc()): ?>

           <tr>

               <td>
                   <?= htmlspecialchars($prato["nome"]) ?>
               </td>

               <td>
                   <?= htmlspecialchars($prato["descricao"]) ?>
               </td>

               <td>
                   R$ <?= number_format(
                       $prato["preco"],
                       2,
                       ",",
                       "."
                   ) ?>
               </td>

               <td>
                   <?= htmlspecialchars($prato["categoria"]) ?>
               </td>

               <td>
                   <?= htmlspecialchars($prato["usuario"]) ?>
               </td>

               <td>

                   <a href="editar.php?id=<?= $prato["id"] ?>">
                       Editar
                   </a>

                   <a
                       href="excluir.php?id=<?= $prato["id"] ?>"
                       onclick="return confirm('Excluir este prato?')"
                   >
                       Excluir
                   </a>

               </td>

           </tr>

       <?php endwhile; ?>

   </table>

   <br>

   <a href="cadastro.php">Cadastrar</a>
   <a href="../index.php">Início</a>

</body>

</html>
