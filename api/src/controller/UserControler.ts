import { response } from 'express';
import { User } from "../entity/User";
import { UserService } from "../services/userService";

const userService = new UserService();

export class UserController {

    async save(request, response) {
        const { name, email } = request.body;

        const user = new User(name, email);

        var savedUser = await userService.save(user);

        response.json(savedUser);
    }
}