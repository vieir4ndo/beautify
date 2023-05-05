import { Router, response } from 'express';
import { UserController } from '../controllers/UserControler';
import { validate } from '../middlewares/validate';
const userController = new UserController();


export const routerUser = Router();

routerUser.use(validate);

routerUser.post('/', userController.save);

routerUser.get('/', userController.getAll)

routerUser.get('/:id', userController.getById)

routerUser.patch('/:id', userController.updateById)

routerUser.delete('/:id', userController.deleteById)