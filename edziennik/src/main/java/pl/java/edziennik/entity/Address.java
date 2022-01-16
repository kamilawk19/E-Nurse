package pl.java.edziennik.entity;

import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Table;

@Entity
@Table(name = "addresses")
@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
public class Address extends BaseEntity {
    @Column(nullable = false, length = 5)
    private String buildingNumber;
    @Column(length = 5)
    private String flatNumber;
    @Column(nullable = false, length = 100)
    private String street;
    @Column(nullable = false, length = 100)
    private String city;
    @Column(nullable = false, length = 6)
    private String zip;
}
