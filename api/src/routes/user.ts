import { Router, response } from 'express';
import { UserController } from '../controllers/UserControler';
const userController = new UserController();


export const routerUser = Router();

routerUser.post('/', userController.save);

routerUser.get('/', userController.getAll)

routerUser.get('/:id', userController.getById)

routerUser.patch('/:id', userController.updateById)

routerUser.delete('/:id', userController.deleteById)