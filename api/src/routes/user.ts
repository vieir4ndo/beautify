import { Router } from 'express';
import { errorHandler } from '../middlewares/errorHandler';
import { UserController } from '../controllers/UserControler';
const userController = new UserController();

export const routerUser = Router();

routerUser.post('/', errorHandler(userController.save));

routerUser.get('/', errorHandler(userController.getAll));

routerUser.get('/:id', errorHandler(userController.getById));

routerUser.patch('/:id', errorHandler(userController.updateById));

routerUser.delete('/:id', errorHandler(userController.deleteById));