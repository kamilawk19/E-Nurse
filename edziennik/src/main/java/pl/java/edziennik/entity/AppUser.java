package pl.java.edziennik.entity;

import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Table;

@Entity
@Table(name = "users")
@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
public class AppUser extends BaseEntity {
    @Column(nullable = false, length = 30, unique = true)
    private String login;
    @Column(nullable = false, length = 60)
    private String password;
    @Column(nullable = false, length = 1)
    private String userType;
}
