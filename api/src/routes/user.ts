import { Router, response } from 'express';
import { validate } from '../middlewares/validate';
import { UserController } from '../controllers/UserControler';
import { createUserValidator } from '../controllers/validators/UserValidator';
const userController = new UserController();

export const routerUser = Router();

routerUser.post('/', validate(createUserValidator), userController.save);

routerUser.get('/', userController.getAll)

routerUser.get('/:id', userController.getById)

routerUser.patch('/:id', userController.updateById)

routerUser.delete('/:id', userController.deleteById)